<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class ArticleRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'category_code', 'title', 'sort', 'tag', 'orderlist', 'created_at', 'visit_num', 'favour_num', 'status', 'edit'],
            'listSearch' => ['id', 'name', 'category_code', 'title', 'sort', 'tag', 'created_at', 'status'],
            'add' => ['name', 'category_code', 'title', 'orderlist', 'status', 'content'],
            'update' => ['name', 'category_code', 'title', 'orderlist', 'status', 'content'],
            'view' => ['id', 'name', 'category_code', 'title', 'sort', 'tag', 'orderlist', 'created_at', 'visit_num', 'favour_num', 'content', 'status'],
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
        $url = "http://md.91zuiai.com/?app={$this->getAppCode()}&resource=articles&id={$model->id}";
        return "<a href='{$url}' target='_blank'>Md编辑</a>";
    }

    public function getFormFields()
    {
        return [
            'category_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => false, 'multiple' => false], 'infos' => $this->getRepositoryObj('category')->getPointTreeDatas('category', 2, 'list')],
        ];
    }

    public function getSearchFields()
    {
        return [
            'created_at' => ['type' => 'datetimerange'],
        ];
    }

    public function getSearchDealFields()
    {
        return [
        ];
    }

    protected function _statusKeyDatas()
    {
        return [
            0 => '发布中',
            1 => '已发布',
            99 => '锁定',
        ];
    }

    public function _getFieldOptions()
    {
        return [
            //'signin_num' => ['width' => '60'],
        ];
    }
}
