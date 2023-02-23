<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;

class NavsortRequest extends AbstractRequest
{
    protected function _addRule()
    {
        return [
            'code' => [
                'bail',
                'required',
                'unique:infocms.position',
            ],
            'parent_code' => ['bail', 'nullable', 'exists:infocms.position,code'],
            'name' => ['bail', 'required'],
            'status' => ['required', $this->_getKeyValues('status')],
        ];
    }

    protected function _updateRule()
    {
        return [
            'code' => [
                'bail',
                'filled',
                $this->getRule()->unique('infocms.position')->ignore($this->routeParam('code', '')),
            ],
            'parent_code' => ['bail', 'filled', 'exists:infocms.position,code'],
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
