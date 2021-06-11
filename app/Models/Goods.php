<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Goods extends AbstractModel
{
    //protected $table = '';
    protected $fillable = ['name'];

    public function categoryCode()
    {
        return $this->hasOne(Category::class, 'code', 'category_code');
    }

    public function skuInfos()
    {
        return $this->hasMany(GoodsSku::class, 'goods_id', 'id');
    }

    public function attributeInfos()
    {
        return $this->hasMany(GoodsAttribute::class, 'goods_id', 'id');
    }
}
