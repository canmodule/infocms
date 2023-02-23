<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Subject extends AbstractModel
{
    protected $table = 'subject';
    protected $primaryKey = 'code';
    public $incrementing = false;

}
