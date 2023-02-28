<?php

declare(strict_types = 1);

namespace ModuleInfocms\Observers;

use ModuleInfocms\Models\Topic;

class TopicObserver
{
    public function created(Topic $model)
    {
        $model->updateTagInfos(['tags' => [$model->code]]);
        return true;
    }

    public function creating(Topic $model)
    {
        $code = $model->code;
        $checkCode = $model->getCodeTag($code);
        if (empty($checkCode)) {
            $checkCode = $model->findCreateTag($code);
        }
        $model->code = $checkCode;
        return true;
    }

    public function deleted(Topic $model)
    {
        $model->deleteTagInfos([]);
        return true;
    }
}
