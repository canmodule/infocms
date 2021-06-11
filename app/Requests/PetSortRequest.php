<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;

class PetSortRequest extends AbstractRequest
{
    protected function _addRule()
    {
        $rules = [
            'code' => ['bail', 'required', 'unique:pet_sort'],
            'name' => ['bail', 'required'],
            'title' => ['bail', 'required'],
            'status' => $this->_getKeyValues('status'),
        ];
        return $rules;
    }

    protected function _updateRule()
    {
        return [
            'code' => ['bail', 'filled', Rule::unique('pet_sort')->ignore($this->routeParam('id', 0), 'code')],
            'name' => ['bail', 'filled', 'string', 'unique:pet_sort', 'between:4,60'],
            'title' => ['bail', 'filled', 'string', 'between:60,300'],
            'status' => $this->_getKeyValues('status'),
        ];
    }

    public function attributes(): array
    {
        return [
            //'name' => '名称',
        ];
    }

    public function messages(): array
    {
        return [
            //'name.required' => '请填写名称',
        ];
    }
}
