<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class SubjectRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'subject_sort', 'group_code', 'name', 'title', 'description', 'created_at', 'status'],
            'listSearch' => ['code', 'name'],
            'add' => ['code', 'subject_sort', 'group_code', 'title', 'description', 'status'],
            'update' => ['subject_sort', 'group_code', 'title', 'description', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            //'type' => ['valueType' => 'key'],
            'subject_sort' => ['valueType' => 'select', 'showType' => 'select', 'infos' => $this->getPointKeyValues('subjectSort')],
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
            'code' => ['type' => 'selectSearch', 'searchApp' => 'passport', 'searchResource' => 'tag', 'allowCustom' => 1],
            'group_code' => ['type' => 'select', 'infos' => $this->getPointKeyValues('group'), 'multiple' => 1],
            'subject_sort' => ['type' => 'select', 'infos' => $this->getPointKeyValues('subjectSort')],
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
