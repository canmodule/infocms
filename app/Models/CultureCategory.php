<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class CultureCategory extends AbstractModel
{
    protected $table = 'culture_category';
    protected $fillable = ['name'];

    public function parentElem()
    {
        return $this->hasOne('ModuleInfocms\Models\CultureCategory', 'code', 'parent_code');
    }

    public function getUrl()
    {
        $url = $this->resource->getPointDomain('cultureDomain') . 'list/' . $this->code;
        return $url;
    }
}
