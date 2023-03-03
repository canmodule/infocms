<?php

declare(strict_types = 1);

namespace ModuleInfocms\Observers;

use Swoolecan\Foundation\Observers\TagTrait;
use ModuleInfocms\Models\Category;

class CategoryObserver
{
    use TagTrait;

    public function saved(Category $model)
    {
        $this->_tagSaved($model);
        return true;
    }

    public function saving(Category $model)
    {
        $this->_tagSaving($model);
        return true;
    }

    public function deleted(Category $model)
    {
        $model->_tagDeleted();
        return true;
    }
}
