<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class ArticleRepository extends AbstractRepository
{
    protected function _statusKeyDatas()
    {
        return [
            0 => '发布中',
            1 => '已发布',
            99 => '锁定',
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'title', 'sort', 'tag', 'orderlist', 'created_at', 'visit_num', 'favour_num', 'status'],
            'listSearch' => ['id', 'name', 'title', 'sort', 'tag', 'created_at', 'status'],
            'add' => ['name', 'title', 'sort', 'tag', 'orderlist', 'status', 'content'],
            'update' => ['name', 'title', 'sort', 'tag', 'orderlist', 'status', 'content'],
        ];
    }

    public function getFormFields()
    {
        return [
            'status' => ['type' => 'radio'],
            'parent_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true], 'infos' => $this->getPointTreeDatas(null, 2, 'list')],
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

    public function _getFieldOptions()
    {
        return [
            //'signin_num' => ['width' => '60'],
        ];
    }
}
