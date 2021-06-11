<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class GoodsRepository extends AbstractRepository
{
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
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name'],
            'view' => ['id', 'name'],
            'full' => ['id', 'name'],
            'listSearch' => ['id', 'name', 'price_origin', 'status'],
            'add' => ['category_code', 'name', 'thumb', 'title', 'price_origin', 'picture', 'orderlist', 'status', 'description', 'content'],
            'update' => ['category_code', 'name', 'thumb', 'title', 'price_origin', 'picture', 'orderlist', 'status', 'description', 'content'],
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
