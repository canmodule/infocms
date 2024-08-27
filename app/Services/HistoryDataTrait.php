<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

use Swoolecan\Foundation\Helpers\DatetimeTool;

trait HistoryDataTrait
{
    public function getSubjectInfos($subjectSort)
    {
        $infos = $this->getModelObj('subject')->where(['subject_sort' => $subjectSort])->orderBy('orderlist', 'desc')->get();;
        $results = [];
        foreach ($infos as $info) {
            $data = $info->toArray();
            $results[] = $data;
        }
        return $results;
    }

    public function getGroupInfos($subjectCode)
    {
        $infos = $this->getModelObj('groupSubject')->where(['subject_code' => $subjectCode])->orderBy('orderlist', 'desc')->get();;
        $results = [];
        foreach ($infos as $info) {
            $data = $info->groupInfo->toArray();
            $results[] = $data;
        }
        return $results;
    }
}
