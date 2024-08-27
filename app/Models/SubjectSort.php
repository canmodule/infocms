<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class SubjectSort extends AbstractModel
{
    protected $table = 'subject_sort';
    protected $primaryKey = 'code';
    public $incrementing = false;

    /*public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }*/

}
