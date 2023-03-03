<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Group extends AbstractModel
{
    protected $table = 'group';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }
}
