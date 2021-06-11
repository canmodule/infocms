<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class PetArticle extends AbstractModel
{
    protected $table = 'pet_article';
    protected $fillable = ['name'];

}
