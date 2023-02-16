<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PositionInfoRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'position_code', 'info_type', 'info_id', 'title', 'icon', 'icon_color', 'icon_path', 'class_style', 'orderlist', 'description', 'status'],
            'listSearch' => ['id', 'name'],
            'add' => ['name'],
            'update' => ['name'],
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
