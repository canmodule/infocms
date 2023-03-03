<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class MicroHeadlineRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'title', 'content', 'created_at', 'updated_at', 'status'],
            'listSearch' => ['id', 'name'],
            'add' => ['category_code', 'name', 'title', 'status', 'content'],
            'update' => ['name'],
        ];
    }

    public function getShowFields()
    {
        return [
        ];
    }

    public function getSearchFields()
    {
        return [
        ];
    }

    public function getFormFields()
    {
        return [
            'category_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => false, 'multiple' => false], 'infos' => $this->getRepositoryObj('category')->getPointTreeDatas('category', 2, 'list')],
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
