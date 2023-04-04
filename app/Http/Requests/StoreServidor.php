<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServidor extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules() //REGLAS DE VALIDACIÓN
    {
        return [
            'nombre' => 'required',
            'sucursalasig' => 'required',
            'ip' => 'required',
            'mascara' => 'required',
            'gateway' => 'required',
            'dns' => 'required',
            'imagen' => 'required|image|max:2048',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre del servidor es obligatorio',
            'sucursalasig.required'=> 'Selecciona la sucursal correspondiente',
            'ip.required'=> 'OBLIGATORIO',
            'mascara.required' => 'OBLIGATORIO',
            'gateway.required'=> 'OBLIGATORIO',
            'dns.required'=> 'OBLIGATORIO',
            'imagen.required'=> 'No olvides que la imagen del servidor tambien es importante',
            'status.required'=> 'Activo O Inactivo'
           // 'categoria.required'=> 'Ingrsa la categoria del curso'
        ];
    }
}
