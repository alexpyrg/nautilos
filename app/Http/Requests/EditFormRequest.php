<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'file_name' => 'nullable',
            'slug' => 'required',
            'is_home' => 'nullable',
            'is_published' => 'nullable'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Πρέπει να εισάγετε όνομα!',
            'file_name.required' => 'Κάτι πήγε λάθος προσπαθήστε ξανά!',
            'slug' => 'Παρακαλώ ελέγξτε την διεύθυνση url που έχετε εισάγει!',
            'is_home' => 'Κάτι πήγε λάθος!',
            'is_published' => 'Κάτι πήγε λάθος!'
        ]; // TODO: Change the autogenerated stub
    }
}
