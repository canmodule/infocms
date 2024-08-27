<?php

declare(strict_types = 1);

namespace ModuleInfocms\Observers;

use ModuleInfocms\Models\Subject;

class SubjectObserver
{
    public function saved(Subject $model)
    {
        $model->afterSave();
        return true;
    }

    public function created(Subject $model)
    {
        //$model->updateTagInfos(['tags' => [$model->code]]);
        return true;
    }

    public function creating(Subject $model)
    {
        /*$code = $model->code;
        $checkCode = $model->getCodeTag($code);
        if (empty($checkCode)) {
            $checkCode = $model->findCreateTag($code);
        }
        $model->code = $checkCode;*/
        return true;
    }

    public function deleted(Subject $model)
    {
        //$model->deleteTagInfos([]);
        return true;
    }
}
