<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Brand extends AbstractModel
{
    protected $primaryKey = 'code';
    protected $table = 'brand';
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany('ModuleInfocms\Models\Product', 'brand_code', 'code');
    }

    public function stores()
    {
        return $this->hasMany('ModuleInfocms\Models\Store', 'brand_code', 'code');
    }

    public function websites()
    {
        return $this->hasMany('ModuleInfocms\Models\Website', 'brand_code', 'code');
    }
}
