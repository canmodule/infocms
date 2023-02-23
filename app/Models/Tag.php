<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Tag extends AbstractModel
{
    protected $table = 'tag';
    protected $primaryKey = 'code';
    public $incrementing = false;

}
