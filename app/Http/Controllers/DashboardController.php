<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Tapel;
use App\Models\Informasi;
use App\Models\NilaiAkhir;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index(Request $request, $role)
  {
      
      if (Auth::user()->role != $role) {
          return back();
      }
  
      $admin = Auth::user()->admin;
      $guru = Auth::user()->guru;
      $wali = Auth::user()->walisiswa;
      $siswa = Auth::user()->siswa;
  
      if(Auth::user()->role == 'admin'){
          $informasi = Informasi::latest()->limit(5)->get();
      }else{
          $informasi = Informasi::where('untuk', auth()->user()->role)->latest()->limit(3)->get();
      }
  
      $semesters = Tapel::distinct()->pluck('semester');
  
      $semester = $request->input('semester'); 
  
      if (Auth::user()->role == 'walisiswa') {
          $tapel = Tapel::where('semester', $semester)->first();
  
          $nilaiRataRata = NilaiAkhir::where('siswa_id', $wali->siswa_id)
              ->whereHas('pembelajaran.kelas.tapel', function($query) use ($semester) {
                  if ($semester) {
                      $query->where('semester', $semester); 
                  }
              })
              ->with('pembelajaran.mapel')
              ->get();
  
          $chartData = [];
          foreach ($nilaiRataRata as $nilai) {
              $chartData[] = [
                  'mapel' => $nilai->pembelajaran->mapel->name,
                  'nilai_akhir' => $nilai->rata_rata
              ];
          }
  
          if (empty($chartData)) {
              $defaultMapels = Mapel::where('tapel_id', $tapel ? $tapel->id : null)->get();
              
              if ($defaultMapels->isEmpty()) {
                  $chartData[] = [
                      'mapel' => "Mapel Semester {$semester} Belum Tersedia"
                  ];
              } else {
                  foreach ($defaultMapels as $mapel) {
                      $chartData[] = [
                          'mapel' => $mapel->name 
                      ];
                  }
              }
          }
      } else {
          $chartData = [];
      }
 
      $cSiswa = Siswa::get()->count();
      $cGuru = Guru::get()->count();
      $cEkstrakurikuler = Ekstrakurikuler::get()->count();
      $cMapel = Mapel::get()->count();
      $cKelas = Kelas::get()->count();

      return view('pages.dashboard.index', compact(
          'role', 'admin', 'guru', 'wali', 'siswa', 'informasi', 'cSiswa', 'cGuru', 'cEkstrakurikuler', 'cMapel', 'cKelas', 'chartData', 'semesters', 'semester'
      ));
  }
  

    public function store(Request $request)
    {
      $req = $request->validate([
        'user_id' => 'required',
        'judul' => 'required',
        'isi' => 'required',
        'untuk' => 'required',
      ]);

      $informasi = Informasi::create($req);
      $informasi;
      return back()->withInfo('Informasi berhasil ditambahkan!');
    }

    public function destroy($id)
    {
      Informasi::find($id)->delete();
      return back()->withInfo('Informasi berhasil dihapus!');
    }
}
