<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_persona'=>'required|max:100',
            'tipo_doc_persona'=>'required|max:20',
            'num_doc_persona'=>'required|max:20',
            'dir_persona'=>'max:70',
            'telefono_persona'=>'max:25',
            'email_persona'=>'max:50'
        ];
    }
}
