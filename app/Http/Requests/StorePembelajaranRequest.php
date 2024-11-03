<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePembelajaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $unique = Rule::unique('mapels')->ignore($this->id);
      return [
          'kelas_id' => ['required'],
          'mapel_id' => ['required'],
          'guru_id' => ['required'],
          'kkm' => ['required', 'numeric', 'max:100'],
      ];
    }
}
