<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class TopicRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'code', 'type', 'name', 'title', 'description', 'created_at', 'updated_at', 'status'],
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
