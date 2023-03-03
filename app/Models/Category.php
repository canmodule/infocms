<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Category extends AbstractModel
{
    protected $table = 'category';
    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function parentInfo()
    {
        return $this->hasOne(Category::class, 'code', 'parent_code');
    }

    public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }

    public function getUrl()
    {
        $url = $this->getResource()->getPointDomain('cultureDomain') . 'list/' . $this->code;
        return $url;
    }

    public function formatForBlog()
    {
        return [
            [
                //'_id' => '589e07c04a4ad562430953d0',
                'id' => 1,
                'name' => $this->name,
                'slug' => $this->code,
                'description' => '不知道啊',
                'extends' => [
                    ['name' => 'icon', 'value' => 'icon-thinking'],
                    ['name' => 'background', 'value' => 'https://static.surmon.me/thumbnail/heart-sutra.jpg'],
                ],
                'pid' => NULL,
                //'__v' => 0,
                //'create_at' => '2017-02-10T18:34:40.680Z',
                //'update_at' => '2021-12-11T06:12:16.084Z',
            ],
        ];
    }
}
