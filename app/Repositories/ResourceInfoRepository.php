<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class ResourceInfoRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'resource_id', 'app', 'info_table', 'info_field', 'info_id', 'deleted_at', 'created_at', 'updated_at', 'extfield'],
            'listSearch' => ['id', 'name'],
            'add' => ['name'],
            'update' => ['name'],
        ];
    }

    public function getShowFields()
    {
        return [
            //'type' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            //'type' => ['type' => 'select'],
        ];
    }

    public function getFormFields()
    {
        return [
            //'type' => ['type' => 'select'],
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
