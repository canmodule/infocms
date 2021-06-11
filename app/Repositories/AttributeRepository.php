<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class AttributeRepository extends AbstractRepository
{
    public function getShowFields()
    {
        return [
            'is_sku' => ['valueType' => 'key'],
            'sort' => ['valueType' => 'key'],
            'description' => ['showType' => 'hidden'],
            'type_code' => ['valueType' => 'point', 'relate' => 'type'],
        ];
    }

    public function getSearchFields()
    {
        return [
            'type_code' => ['type' => 'select', 'infos' => $this->getPointKeyValues('type')],
            'sort' => ['type' => 'select', 'infos' => $this->getKeyValues('sort')],
            'is_sku' => ['type' => 'select', 'infos' => $this->getKeyValues('is_sku')],
        ];
    }

    public function getFormFields()
    {
        return [
            'type_code' => ['type' => 'select', 'infos' => $this->getPointKeyValues('type')],
            'sort' => ['type' => 'select', 'infos' => $this->getKeyValues('sort')],
            'is_sku' => ['type' => 'select', 'infos' => $this->getKeyValues('is_sku')],
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'type_code', 'sort', 'orderlist', 'default', 'is_sku', 'status', 'description', 'updated_at', 'point_operation'],
            'listSearch' => ['id', 'name', 'type_code', 'sort', 'is_sku', 'status'],
            'add' => ['name', 'type_code', 'sort', 'orderlist', 'default', 'is_sku', 'status', 'description'],
            'update' => ['name', 'type_code', 'sort', 'orderlist', 'default', 'is_sku', 'status', 'description'],
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

    protected function _sortKeyDatas()
    {
        return [
            0 => '未激活',
            1 => '使用中',
            99 => '锁定',
        ];
    }

    protected function _is_skuKeyDatas()
    {
        return [
            0 => '非SKU',
            1 => 'SKU',
        ];
    }

    protected function _sku_fieldKeyDatas()
    {
        return [
            'skuv1' => 'SKUV-1',
            'skuv2' => 'SKUV-2',
            'skuv3' => 'SKUV-3',
        ];
    }

    public function _getFieldOptions()
    {   
        return [
            'description' => ['hidden' => 1],
        ];  
    } 

    protected function _pointOperations($model, $field)
    {
        if (!in_array($model->sort, ['radio', 'checkbox'])) {
            return [];
        }
        $add = [
            'name' => '添加属性值',
            'type' => 'popForm',
            'resource' => 'attributeValue',
            'app' => $this->config->get('app_code'),
            'params' => ['attribute_id' => $model->id],
        ];

        $list = [
            'name' => '属性值列表',
            'type' => 'popTable',
            'resource' => 'attributeValue',
            'app' => $this->config->get('app_code'),
            'params' => ['attribute_id' => $model->id],
        ];
        return [$add, $list];
    }
}
