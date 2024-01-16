<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class SubjectSortRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'name', 'description', 'orderlist', 'status'],
            'listSearch' => ['id', 'name'],
            'add' => ['code', 'title', 'description', 'orderlist', 'status'],
            'update' => ['title', 'description', 'orderlist', 'status'],
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
