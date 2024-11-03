<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\ResetPasswordEmail;
use App\Models\PasswordResetToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\PasswordReset;

class LoginController extends Controller
{
    public function index()
    {
      return view('login2');
    }

    public function cekLogin(Request $request)
    {
      $input = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
      ]);

      if (Auth::attempt($input)) {
        $role = auth()->user()->role;
        // dd($role);
        return redirect( $role . '/dashboard')->with('login', $role);
      } else {
        return back()->withInfo('Username atau password salah!');
      }
    }

    public function mailSend(Request $request)
    {
      $request->validate(['email' => 'required|email']);

      $user = User::where('email', $request->email)->first();

      if (!$user) {
          return back()->withError(['email' => __('Email tidak ditemukan.')]);
      }

      $existingToken = PasswordResetToken::where('email', $request->email)->first();
      // dd($existingToken);
      if ($existingToken) {
          // Periksa nilai is_used
          if ($existingToken->is_used) {
              $existingToken->is_used = false;
              $existingToken->save();
          }
          // Gunakan token yang ada
          $token = $existingToken->token;
          $expiredAt = $existingToken->expired_at;
      }
          // Jika tidak, buat token baru
          $token = $user->id . '-' . now()->format('Ymd') . '-' . Str::random(10);
          $expiredAt = Carbon::now()->addHours(24);
          $createdAt = Carbon::now();
          
          // dd($expiredAt);
          // Update token atau buat token baru
          PasswordResetToken::updateOrCreate(
              ['email' => $request->email],
              ['token' => $token, 'expired_at' => $expiredAt, 'created_at' => $createdAt]
          );

      Mail::to($request->email)->send(new ResetPasswordEmail($token));

      return back()->withInfo('Reset Password Berhasil Terkirim!');
    }



    public function showResetPasswordForm($token) {
        $email = PasswordResetToken::where('token', $token)->pluck('email')->first();
    
        return view('reset-password', ['token' => $token, 'email' => $email]);
    }

    public function resetPassword(Request $request)
    {
        $token = $request->token;

        $resetToken = PasswordResetToken::where('token', $token)->first();

        if (!$resetToken || $resetToken->is_used) {
            return redirect()->route('login')->with('error' ,'Token reset password tidak valid.');
        }

        if ($resetToken->expired_at && $resetToken->expired_at < Carbon::now()) {
            return redirect()->route('login')->with('error' ,'Token reset password telah kadaluarsa.');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInfo(['email' => __('User tidak ditemukan.')]);
        }

        $user->password = bcrypt($request->password2);
        $user->save();

        $resetToken->is_used = true;
        $resetToken->used_at = Carbon::now();
        $resetToken->save();

        event(new PasswordReset($user));

        return redirect()->route('login')->withInfo('Password anda berhasil di reset! silakan Login!');
  }
}
