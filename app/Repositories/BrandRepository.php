<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class BrandRepository extends AbstractRepository
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
            'sort' => ['type' => 'select', 'infos' => $this->getKeyValues('sort')],
        ];
    }

    public function getFormFields()
    {
        return [
            'sort' => ['type' => 'select', 'infos' => $this->getKeyValues('sort')],
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'code', 'sort', 'company', 'name', 'logo', 'website', 'picture', 'orderlist', 'hotline', 'builder', 'build_time', 'status', 'created_at'],
            'listSearch' => ['id', 'name'],
            'add' => ['code', 'sort', 'company', 'name', 'logo', 'title', 'website', 'picture', 'orderlist', 'hotline', 'builder', 'build_time', 'address_first', 'status', 'description', 'story'],
            'update' => ['code', 'sort', 'company', 'name', 'logo', 'title', 'website', 'picture', 'orderlist', 'hotline', 'builder', 'build_time', 'address_first', 'status', 'description', 'story'],
        ];
    }

    protected function _sortKeyDatas()
    {
        return [
            'stationery' => '文具/学习',
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

    public function getHaveSelection($scene)
    {   
        return true;
    }   

    public function getSelectionOperations($scene)
    {   
        return [
            'delete' => ['name' => '批量删除', 'operation' => 'delete', 'app' => $this->config->get('app_code')],
            'select' => ['name' => '确定选中', 'operation' => 'select', 'app' => $this->config->get('app_code')],
        ]; 
    }
}
