<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchRequest extends Request
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
            'searchTerm' => 'required|min:3|max:50',
        ];
    }

    /**
     * Set the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'searchTerm.required'   => 'Search was empty',
            'searchTerm.min:'       => 'Search must have a minimum of :min characters',
            'searchTerm.max'        => 'Search must have a max of :max characters',
        ];
    }
}
