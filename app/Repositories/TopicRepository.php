<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class TopicRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'name', 'badge', 'title', 'description', 'created_at', 'status'],
            'listSearch' => ['name', 'code', 'badge', 'status', 'created_at'],
            'add' => ['code', 'title', 'badge', 'description', 'status'],
            'update' => ['code', 'title', 'badge', 'description', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'badge' => ['valueType' => 'key'],
            //'name' => ['valueType' => 'callback', 'method' => 'formatTagShow'],
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
            'code' => ['type' => 'selectSearch', 'searchApp' => 'passport', 'searchResource' => 'tag', 'allowCustom' => 1],
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
