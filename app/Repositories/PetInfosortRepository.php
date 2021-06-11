<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PetInfosortRepository extends AbstractRepository
{
    public function getShowFields()
    {
        return [
            'type' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'status' => ['type' => 'select', 'infos' => $this->getKeyValues('status')],
            'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    public function getFormFields()
    {
        return [
            'status' => ['type' => 'select', 'infos' => $this->getKeyValues('status')],
            'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'code', 'type', 'title', 'description', 'status'],
            'listSearch' => ['id', 'name', 'code', 'type', 'status'],
            'add' => ['code', 'name', 'type', 'title', 'description', 'status'],
            'update' => ['code', 'name', 'type', 'title', 'description', 'status'],
        ];
    }

    protected function _typeKeyDatas()
    {
        return [
            'feed' => '喂养',
            'train' => '训练',
            'medical' => '治疗',
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
