<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class SubjectRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'type', 'group_code', 'name', 'title', 'description', 'created_at', 'status'],
            'listSearch' => ['id', 'name'],
            'add' => ['code', 'type', 'group_code', 'title', 'description', 'status'],
            'update' => ['code', 'type', 'group_code', 'title', 'description', 'status'],
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
            //'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    public function getFormFields()
    {
        return [
            //'type' => ['type' => 'select'],
            'group_code' => ['type' => 'select', 'infos' => $this->getPointKeyValues('group'), 'multiple' => 1],
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
