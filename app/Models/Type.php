<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Type extends AbstractModel
{
    //protected $table = '';
    public $incrementing = false;
    protected $primaryKey = 'code';
    //protected $fillable = ['name'];
    public $timestamps = false;

    public function getSkuElems($skuValues = null)
    {
        $attributes = $this->attributeDatas;
        $attributes->sortByDesc('orderlist');
        $datas = [];
        foreach ($attributes as $attribute){
            if (!$attribute->is_sku) {
                continue;
            }
            $skuField = $attribute['sku_field'];
            $datas[$attribute['id']] = [
                'name' => $attribute['name'],
                'sku_field' => $skuField,
                'values' => in_array($attribute->sort, ['checkbox', 'radio']) ? $this->getAttributeValues($attribute) : [],
                'currentValue' => $skuValues[$skuField] ?? [],
            ];
        }
        return $datas;
    }

    public function getAttributeElems($infos = null)
    {
        if ($infos) {
            $infos = $infos->keyBy('attribute_id');
        }
        $datas = [];
        foreach ($this->attributeDatas as $attribute){
            if ($attribute->is_sku) {
                continue;
            }
            $datas[$attribute['id']] = [
                'name' => $attribute['name'],
                'sort' => $attribute['sort'],
                'values' => in_array($attribute->sort, ['checkbox', 'radio']) ? $this->getAttributeValues($attribute) : [],
                'currentValue' => isset($infos[$attribute['id']]) ? $infos[$attribute['id']]['value'] : '',
            ];
        }
        return $datas;
    }

    protected function getAttributeValues($attribute)
    {
        $values = $attribute->attributeValues;
        $values = $values->sortByDesc('orderlist');
        $datas = [];
        foreach ($values->toArray() as $value) {
            $datas[$value['id'] . '_sku'] = [
                'name' => $value['name'],
                'value' => $value['value'],
                'orderlist' => $value['orderlist'],
                'mark' => $value['mark'],
            ];
        }
        return $datas;
    }

    public function attributeDatas()
    {
        return $this->hasMany(Attribute::class, 'type_code', 'code');
    }
}
