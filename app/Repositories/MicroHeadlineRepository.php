<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class MicroHeadlineRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'title', 'content', 'created_at', 'updated_at', 'status', 'edit'],
            'listSearch' => ['id', 'name'],
            'view' => ['id', 'category_code', 'name', 'title', 'status', 'content'],
            'add' => ['category_code', 'name', 'title', 'status', 'content'],
            'update' => ['category_code', 'name', 'title', 'status', 'content'],
        ];
    }

    public function getShowFields()
    {
        return [
            'edit' => ['valueType' => 'callback', 'method' => 'formatEditMd'],
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

    public function formatEditMd($model, $field)
    {
        $url = "http://md.canliang.wang/?app={$this->getAppCode()}&resource=micro-headlines&id={$model->id}";
        return "<a href='{$url}' target='_blank'>Md编辑</a>";
    }
}
