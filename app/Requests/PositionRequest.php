<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;

class PositionRequest extends AbstractRequest
{
    protected function _addRule()
    {
        return [
            'code' => [
                'bail',
                'required',
                'unique:infocms.position',
            ],
            'name' => ['bail', 'required'],
            'type' => ['required', $this->_getKeyValues('type')],
            'status' => ['required', $this->_getKeyValues('status')],
            'orderlist' => [],
            'description' => [],
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
