<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class CategoryRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['name', 'parent_code', 'code', 'title', 'brief', 'description', 'orderlist', 'status'],
            'listSearch' => ['code', 'parent_code', 'title', 'status'],
            'add' => ['parent_code', 'code', 'title', 'brief', 'description', 'orderlist', 'status'],
            'update' => ['parent_code', 'code', 'title', 'brief', 'description', 'orderlist', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'parent_code' => ['valueType' => 'point', 'relate' => 'parentInfo'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'parent_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true, 'multiple' => true], 'infos' => $this->getPointTreeDatas(null, 2, 'list')],
        ];
    }

    public function getFormFields()
    {
        return [
            'parent_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true], 'infos' => $this->getPointTreeDatas(null, 2, 'list')],
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

    public function _getFieldOptions()
    {
        return [
            'name' => ['width' => '200', 'align' => 'left'],
        ];
    }
}
