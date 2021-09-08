<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Category extends AbstractModel
{
    protected $table = 'category';
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $fillable = ['name'];

}
