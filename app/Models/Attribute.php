<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Attribute extends AbstractModel
{
    //protected $table = '';
    protected $fillable = ['name'];

    public function type()
    {
        return $this->hasOne(Type::class, 'code', 'type_code');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'id');
    }
}
