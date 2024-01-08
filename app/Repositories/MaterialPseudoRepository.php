<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class MaterialPseudoRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'material_source_id', 'category_code', 'name', 'title', 'description', 'orderlist', 'status', 'created_at', 'edit'],
            'listSearch' => ['id', 'name', 'material_pseudo_id', 'status'],
            'add' => ['id', 'name', 'material_source_id', 'content', 'titlt', 'description', 'orderlist', 'status'],
            'update' => ['id', 'name', 'material_source_id', 'content', 'titlt', 'description', 'orderlist', 'status'],
            'view' => ['id', 'name', 'material_source_id', 'category_code', 'title', 'orderlist', 'created_at', 'content', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'edit' => ['valueType' => 'callback', 'method' => 'formatEditMd'],
        ];
    }

    public function formatEditMd($model, $field)
    {
        $url = "http://md.canliang.wang/?app={$this->getAppCode()}&resource=material-pseudos&id={$model->id}";
        return "<a href='{$url}' target='_blank'>Md编辑</a>";
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
