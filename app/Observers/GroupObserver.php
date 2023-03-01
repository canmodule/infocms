<?php

declare(strict_types = 1);

namespace ModuleInfocms\Observers;

use ModuleInfocms\Models\Group;

class GroupObserver
{
    public function created(Group $model)
    {
        $model->updateTagInfos(['tags' => [$model->code]]);
        return true;
    }

    public function creating(Group $model)
    {
        $code = $model->code;
        $checkCode = $model->getCodeTag($code);
        if (empty($checkCode)) {
            $checkCode = $model->findCreateTag($code);
        }
        $model->code = $checkCode;
        return true;
    }

    public function deleted(Group $model)
    {
        $model->deleteTagInfos([]);
        return true;
    }
}
