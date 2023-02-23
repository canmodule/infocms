<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Navsort extends AbstractModel
{
    protected $table = 'navsort';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;

    public function parentInfo()
    {
        return $this->hasOne(Navsort::class, 'code', 'parent_code');
    }
}
