<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;

class MaterialSourceRequest extends AbstractRequest
{
    protected function _addRule()
    {
        return [
            'url' => ['bail', 'active_url'],
            'parent_code' => ['bail', 'nullable', 'exists:infocms.category,code'],
            'status' => ['bail', 'nullable', $this->_getKeyValues('status')],
            'attention' => ['bail', 'nullable', $this->_getKeyValues('status')],
        ];
    }

    protected function _updateRule()
    {
        return [
            'parent_code' => ['bail', 'nullable', 'exists:infocms.category,code'],
            'status' => ['bail', 'nullable', $this->_getKeyValues('status')],
            'attention' => ['bail', 'nullable', $this->_getKeyValues('status')],
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
