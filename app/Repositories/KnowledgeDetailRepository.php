<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class KnowledgeDetailRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'code', 'knowledge_code', 'detail_type', 'serial', 'name', 'title', 'tag', 'description', 'record_first', 'record_last', 'record_num', 'status', 'deleted_at', 'created_at', 'updated_at'],
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
