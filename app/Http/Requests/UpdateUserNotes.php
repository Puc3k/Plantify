<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserNotes extends FormRequest
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
            'plantId' => 'integer|required',
            'userId' => 'integer|required',
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:3|max:500',
            'date' => 'nullable|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Notatka musi mieć tytuł!',
            'title.min' => 'Podany tytuł notatki musi mieć min 3 znaki',
            'title.max' => 'Podany tytuł notatki może mieć max 50 znaków',
            'description.required' => 'Notatka musi mieć opis!',
            'description.min' => 'Podany opis notatki musi mieć min 3 znaki',
            'description.max' => 'Podany opis notatki może mieć max 500 znaków',
            'date.after_or_equal' => 'Nie możesz tworzyć notatek wstecz!'
        ];
    }
}
