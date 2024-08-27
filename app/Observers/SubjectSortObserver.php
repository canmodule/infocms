<?php

declare(strict_types = 1);

namespace ModuleInfocms\Observers;

use ModuleInfocms\Models\SubjectSort;

class SubjectSortObserver
{
    /*public function saved(SubjectSort $model)
    {
        //$model->afterSave();
        return true;
    }

    public function created(SubjectSort $model)
    {
        $model->updateTagInfos(['tags' => [$model->code]]);
        return true;
    }

    public function creating(SubjectSort $model)
    {
        $code = $model->code;
        $checkCode = $model->getCodeTag($code);
        if (empty($checkCode)) {
            $checkCode = $model->findCreateTag($code);
        }
        $model->code = $checkCode;
        return true;
    }

    public function deleted(SubjectSort $model)
    {
        $model->deleteTagInfos([]);
        return true;
    }*/
}
