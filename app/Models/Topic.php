<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Topic extends AbstractModel
{
    protected $table = 'topic';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }
}
