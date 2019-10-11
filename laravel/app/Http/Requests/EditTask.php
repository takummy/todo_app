<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = parent::rules();
        return $rule;
    }

    public function attributes()
    {
        $attributes = parent::attributes();
        return $attributes;
    }
}
