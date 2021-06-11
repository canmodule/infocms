<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;

use Hyperf\Validation\Rule;

class TypeRequest extends AbstractRequest
{
    protected function _updateRule()
    {
        return [
            'code' => ['bail', 'filled', Rule::unique('type')->ignore($this->routeParam('code', ''), 'code')],
            'name' => ['bail', 'filled'],
        ];
    }

    protected function _addRule()
    {
        $rules = [
            'code' => ['bail', 'required', 'unique:type'],
            'name' => ['bail', 'required'],
            'status' => $this->_getKeyValues('status'),
        ];
        return $rules;
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
