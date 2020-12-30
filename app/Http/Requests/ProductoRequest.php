<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
       //dd($this->request);
        return [
            'description' => 'required',
            'id_provededor' => 'required',
            'quantity'=> 'required',
            'price' => 'required',

        ];

    }
    public function messages()
    {

        return [
            'description.required'   => 'Es requerido',
            'proveedor_id.required'   => 'Es requerido',
            'quantity.required'   => 'Es requerido',
            'price.required'   => 'Es requerido',


        ];
    }
}
