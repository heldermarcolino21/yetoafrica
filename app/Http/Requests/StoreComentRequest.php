<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentRequest extends FormRequest
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
           'publicacao_id'=>'required|exists:publicacao,id',
            'titulo'=>'required|min:3|max:100',
            'conteudo'=>'required|min:3|max:10000'
        ];
    }
}
