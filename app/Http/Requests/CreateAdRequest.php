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
            'price' => ['required', 'numeric', 'min:0'],
            'year' => ['required_if:type, vehicle', 'numeric'],
            'engine_displacement' => ['required_if:type,vehicle'],
            'vehicle_class' => ['required_if:type,vehicle'],
            'vehicle_model' =>['required_if:type,vehicle'],
            'description' => ['required', 'string'],
            'fixed' => ['required'],
            'images' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'size' => ['required_if:type, equipment'],
            'brand' => ['required_if:type, equipment'],
            'isNew' => ['required_if: type, equipment'],
            'homologacija' => ['required_if:type, equipment'],
            'homologacija_info' => ['required_if:type, equipment', 'required_if:homologacija, true'],
            'manufacter' => ['required_if:type, tires'],
            'dot' => ['required_if:type, tires'],
            'dimensions' => ['required_if:type, tires'],
            'model' => ['required_if:type, tires'],
            'number_of_tires' => ['required_if:type, tires']

        ];
    }
    public function messages()
    {
        return [
            'type.required' => "Tip je obavezan!",
            'discipline.required_if' => "Za izabran tip, disciplina je obavezna",
            'slug.required' => "Kratak opis teksta je obavezan",
            'price.required' => "Cena je obavezna",
            'price.numeric' => "Cena mora biti napisana brojevima",
            'price.min' => "Cena ne moze biti manja od 0",
            'engine_displacement.required_if' => "Ovo polje je obavezno",
            'vehicle_class.required_if' => "Ovo polje je obavezno",
            'vehicle_model.required_if' => "Model je obavezan",
            'description.required' => "Ovo polje je obavezno",
            'images.required' => "Slike su obavezne",
            'name.required' => "Ime je obavezno",
            'fixed.required' => "Ovo polje je obavezno",
            'size.required_if' => "Velicina je obavezna",
            'brand.required_if' => "Brend je obavezan",
            'isNew.required_if' => "Ovo polje je obavezno",
            'homologacija.required_if' => "Ovo polje je obavezno",
            'homologacija_info' => "Ovo polje je obavezno",
            'manufacter.required_if' => "Ovo polje je obavezno",
            'dot.required_if' => "Ovo polje je obavezno",
            'dimensions.required_if' => "Ovo polje je obavezno",
            'model.required_if' => "Ovo polje je obavezno",
            'year.required_if' => "Godiste je obavezno",
            'number_of_tires.required_if' => "Broj guma je obavezan",
        ];
    }
}
