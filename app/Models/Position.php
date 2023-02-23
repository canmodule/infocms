<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Position extends AbstractModel
{
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $table = 'position';
    protected $guarded = [];
}
