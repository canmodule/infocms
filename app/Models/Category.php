<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Category extends AbstractModel
{
    //protected $table = '';
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $fillable = ['name'];

    public function type()
    {
        return $this->hasOne(Type::class, 'code', 'type_code');
    }

}
