<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;
use Hyperf\Validation\Rule;

class BrandRequest extends AbstractRequest
{
    protected function _updateRule()
    {
        return [
            'code' => ['bail', 'filled', Rule::unique('brand')->ignore($this->routeParam('id', 0), 'code')],
        ];
    }

    protected function _addRule()
    {
        $rules = [
            'code' => ['bail', 'required', 'unique:brand'],
            'name' => ['bail', 'required'],
            'sort' => ['bail', 'required'],
            'title' => ['bail', 'required'],
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
