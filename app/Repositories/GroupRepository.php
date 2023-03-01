<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class GroupRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'type', 'name', 'title', 'description', 'created_at', 'updated_at', 'status', 'orderlist'],
            'listSearch' => ['name'],
            'add' => ['code', 'type', 'name', 'title', 'description', 'status', 'orderlist'],
            'update' => ['code', 'type', 'name', 'title', 'description', 'status', 'orderlist'],
        ];
    }

    public function getShowFields()
    {
        return [
            //'type' => ['valueType' => 'key'],
            'name' => ['valueType' => 'callback', 'method' => 'formatTagShow'],
        ];
    }

    public function getSearchFields()
    {
        return [
            //'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    public function getFormFields()
    {
        return [
            //'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
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
