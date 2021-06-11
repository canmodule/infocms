<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Product extends AbstractModel
{
    protected $table = 'product';
    protected $fillable = ['name'];

    public function website()
    {
        return $this->hasOne('ModuleInfocms\Models\Website', 'foreign_key', 'local_key');
    }
}
