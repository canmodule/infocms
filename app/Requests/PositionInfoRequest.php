<?php

declare(strict_types = 1);

namespace ModuleInfocms\Requests;

class PositionInfoRequest extends AbstractRequest
{
    protected function _addRule()
    {
        return [
            'title' => ['bail', 'string', 'required'],
            'position_code' => ['bail', 'required', 'exists:infocms.position,code'],
            'jump_type' => $this->_getKeyValues('jumpType'),
            'description' => [],
            'url' => [],
            'filter_params' => [],
            'icon' => [],
            'status' => $this->_getKeyValues('status'),
            'orderlist' => [],
        ];
    }

    protected function _updateRule()
    {
        return [
            'title' => [],
            'position_code' => [],
            'jump_type' => $this->_getKeyValues('jumpType'),
            'description' => [],
            'url' => [],
            'filter_params' => [],
            'icon' => [],
            'status' => $this->_getKeyValues('status'),
            'orderlist' => [],
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
