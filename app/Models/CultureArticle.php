<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class CultureArticle extends AbstractModel
{
    protected $table = 'culture_article';
    protected $fillable = ['name', 'content'];

    public function cultureCategory()
    {
        return $this->hasOne('ModuleInfocms\Models\CultureCategory', 'code', 'category_code');
    }

    public function getUrl()
    {
        $url = $this->getResource()->getPointDomain('cultureDomain') . 'show-' . $this->id;
        return $url;
    }
}
