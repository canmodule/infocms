<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PositionInfoRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'title', 'position_code', 'picture', 'jump_type', 'url', 'filter_params', 'icon', 'orderlist', 'description', 'status'],
            'listSearch' => ['id', 'title', 'position_code', 'jump_type', 'status'],
            'add' => ['title', 'position_code', 'picture', 'jump_type', 'url', 'filter_params', 'icon', 'orderlist', 'description', 'status'],
            'update' => ['title', 'position_code', 'picture', 'jump_type', 'url', 'filter_params', 'icon', 'orderlist', 'description', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'jump_type' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'jump_type' => ['type' => 'select', 'multiple' => 1],
        ];
    }

    public function getFormFields()
    {
        return [
            'jump_type' => ['type' => 'select'],
            'position_code' => ['type' => 'selectSearch', 'require' => ['add'], 'searchResource' => 'position'],
            //'filter_params' => ['valueType' => 'select'],
        ];
    }

    protected function _jumpTypeKeyDatas()
    {
        return [
            '' => '无类型',
            'website' => '页面',
            'miniprogram' => '小程序',
        ];
    }

    protected function _statusKeyDatas()
    {
        return [
            0 => '未激活',
            1 => '使用中',
            99 => '锁定',
        ];
    }
}
