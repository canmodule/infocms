<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PetSortRepository extends AbstractRepository
{
    public function getShowFields()
    {
        return [
            'title' => ['showType' => 'edit'],
            'description' => ['showType' => 'popover', 'valueType' => 'popover'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'status' => ['type' => 'select', 'infos' => $this->getKeyValues('status')],
        ];
    }

    public function getFormFields()
    {
        return [
            'status' => ['type' => 'select', 'infos' => $this->getKeyValues('status')],
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'code', 'title', 'description', 'status'],
            'listSearch' => ['id', 'name', 'code', 'status'],
            'add' => ['code', 'name', 'title', 'description', 'status'],
            'update' => ['code', 'name', 'title', 'description', 'status'],
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

    public function _getFieldOptions()
    {
        return [
            'title' => ['width' => '200', 'rowNum' => 1, 'withPop' => 1],
        ];
    }
}
