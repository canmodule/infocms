<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class NavsortRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['name', 'parent_code', 'code', 'thumb', 'name_short', 'icon', 'path', 'url', 'orderlist', 'description', 'status'],
            'listSearch' => ['parent_code', 'code', 'name'],
            'add' => ['parent_code', 'code', 'name', 'thumb', 'name_short', 'icon', 'path', 'url', 'orderlist', 'description', 'status'],
            'update' => ['parent_code', 'code', 'name', 'thumb', 'name_short', 'icon', 'path', 'url', 'orderlist', 'description', 'status'],
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
            'parent_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true], 'infos' => $this->getPointTreeDatas(null, 2, 'list')],
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
            'name' => ['width' => '200', 'align' => 'left'],
        ];
    }
}
