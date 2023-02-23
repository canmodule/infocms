<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class TopicRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'type', 'name', 'badge', 'title', 'description', 'created_at', 'status'],
            'listSearch' => ['name', 'code', 'badge', 'status', 'created_at'],
            'add' => ['code', 'type', 'name', 'badge', 'title', 'description', 'status'],
            'update' => ['code', 'type', 'name', 'badge', 'title', 'description', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'badge' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'badge' => ['type' => 'select'],
        ];
    }

    public function getFormFields()
    {
        return [
            'badge' => ['type' => 'select'],
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

    protected function _badgeKeyDatas()
    {
        return [
            'hot' => 'HOT',
            'recommend' => '推荐',
            'look' => '看看',
        ];
    }
}
