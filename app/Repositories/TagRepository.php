<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class TagRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'sort', 'name', 'badge', 'title', 'description', 'created_at', 'status'],
            'listSearch' => ['name', 'code', 'badge', 'status', 'created_at'],
            'add' => ['code', 'sort', 'name', 'badge', 'title', 'description', 'status'],
            'update' => ['code', 'sort', 'name', 'badge', 'title', 'description', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'badge' => ['valueType' => 'key'],
            'sort' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'badge' => ['type' => 'select'],
            'sort' => ['type' => 'select'],
        ];
    }

    public function getFormFields()
    {
        return [
            'badge' => ['type' => 'select'],
            'sort' => ['type' => 'select'],
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

    protected function _sortKeyDatas()
    {
        return [
            '' => '未分类',
            'topic' => '话题',
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
