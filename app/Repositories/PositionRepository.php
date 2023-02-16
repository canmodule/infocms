<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PositionRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'type', 'name', 'orderlist', 'description', 'status', 'created_at'], 
            'listSearch' => ['code', 'name', 'type', 'status', 'created_at'],
            'add' => ['code', 'type', 'name', 'orderlist', 'description', 'status'],
            'update' => ['code', 'name', 'type', 'orderlist', 'description', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'type' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    public function getFormFields()
    {
        return [
            'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    protected function _typeKeyDatas()
    {
        return [
            'website' => '官网',
            'group' => '圈子',
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
