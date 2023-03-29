<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class MaterialSource extends AbstractModel
{
    protected $table = 'material_source';
    protected $guarded = ['id'];

    public function getMaterialNumAttribute()
    {
        return $this->getModelObj('materialPseudo')->where(['material_source_id' => $this->id])->count();
    }
}
