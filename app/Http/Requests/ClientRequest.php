<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new Client)->getTable())->ignore($this->route()->client->id ?? null)
            ],
            'document_type' => [
                'required', 'max:3'
            ],
            'document_id' => [
                'required',
            ],

        ];
    }
}
