<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Pet extends AbstractModel
{
    protected $table = 'pet';
    protected $fillable = ['name'];

}
