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
        $domain = $this->getUploadUrl();
        return rtrim($domain, '/') . '/' . $this->filepath;
    }

    protected function getUploadUrl()
    {
        return config('app.uploadUrl');
    }
}
