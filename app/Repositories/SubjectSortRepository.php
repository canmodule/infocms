<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class SubjectSortRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'name', 'cover', 'description', 'orderlist', 'status'],
            'listSearch' => ['id', 'name'],
            'add' => ['code', 'title', 'cover', 'description', 'orderlist', 'status'],
            'update' => ['title', 'cover', 'description', 'orderlist', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            //'type' => ['valueType' => 'key'],
            'orderlist' => ['showType' => 'edit'],
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

    protected function _typeKeyDatas()
    {
        return [
            'ruxue' => '儒学',
            'luxunzhuanlan' => '鲁迅专栏',
            'zhongguolishi' => '中国历史',
            'waiguolishi' => '外国历史',
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
