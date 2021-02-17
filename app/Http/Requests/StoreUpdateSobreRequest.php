<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSobreRequest extends FormRequest
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
        return [
        'sobre_img'=>'required|image',
        'sobre_descricao'=>'nullable|min:3|max:10000',
        'sobre_titulo'=>'required|min:3|max:255'
        ];
    }

    public function messages()
    {
       return[ 
           
        'sobre_titulo.required' => 'o título é obrigatório'

       ];
    }
}
