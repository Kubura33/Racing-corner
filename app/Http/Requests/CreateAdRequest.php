<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required'],
            'discipline' => ['required_if:type,vehicle'],
            'slug' => ['required', 'string', 'max:250'],
            'price' => ['required', 'numeric', 'min:0'],
            'engine_displacement' => ['required_if:type,vehicle'],
            'vehicle_class' => ['required_if:type,vehicle'],
            'description' => ['required', 'string'],
            'images' => ['required'],
            'name' => ['required', 'string', 'max:255']
        ];
    }
    public function messages()
    {
        return [
            'type.required' => "Tip je obavezan!",
            'discipline.required_if' => "Za izabran tip, disciplina je obavezna",
            'slug.required' => "Kratak opis teksta je obavezan",
            'slug.max' => "Maksimalan broj karaktera kratkog oglasa je 250 karaktera",
            'price.required' => "Cena je obavezna",
            'price.numeric' => "Cena mora biti napisana brojevima",
            'price.min' => "Cena ne moze biti manja od 0",
            'engine_displacement.required_if' => "Ovo polje je obavezno",
            'vehicle_class.required_if' => "Ovo polje je obavezno",
            'description.required' => "Ovo polje je obavezno",
            'images.required' => "Slike su obavezne",
            'name.required' => "Ime je obavezno",
        ];
    }
}
