<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class CategoryRepository extends AbstractRepository
{
    public function getShowFields()
    {
        return [
            'type_code' => ['valueType' => 'point', 'relate' => 'type'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'type_code' => ['type' => 'select', 'infos' => $this->getPointKeyValues('type')],
            'parent_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true, 'multiple' => true], 'infos' => $this->getPointTreeDatas(null, 2, 'list')],
        ];
    }

    public function getFormFields()
    {
        return [
            'type_code' => ['type' => 'select', 'infos' => $this->getPointKeyValues('type')],
            'parent_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true], 'infos' => $this->getPointTreeDatas(null, 2, 'list')],
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['code', 'name', 'type_code', 'parent_code', 'orderlist', 'status'],
            'listSearch' => ['code', 'name', 'type_code', 'parent_code', 'status'],
            'add' => ['code', 'name', 'type_code', 'brief', 'description', 'parent_code', 'orderlist', 'meta_title', 'meta_keyword', 'meta_description', 'status'],
            'update' => ['code', 'name', 'type_code', 'brief', 'description', 'parent_code', 'orderlist', 'meta_title', 'meta_keyword', 'meta_description', 'status'],
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
