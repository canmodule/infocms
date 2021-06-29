<?php

namespace ModuleInfocms\Models;

class Attachment extends AbstractModel
{
    protected $table = 'attachment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function getUrlAttribute()
    {
        $domain = $this->getResource()->getPointDomain('uploadUrl');
        return $domain . $this->filepath;
    }
}
