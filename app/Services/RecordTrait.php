<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

trait RecordTrait
{
    public function _getSortRecords($pointSubject = null, $withInfo = false)
    {
        $infos = $this->getModelObj('subject')->orderBy('orderlist', 'desc')->get();;
        $ssInfos = $this->getModelObj('subjectSort')->get();
        $subjectSorts = [];
        foreach ($ssInfos as $ssInfo) {
            $subjectSorts[$ssInfo['code']] = $ssInfo->toArray();
        }

        $results = $sInfos = [];
        if ($withInfo) {
            $infos = $this->getModelObj('knowledge')->get();
            foreach ($infos as $info) {
                $sInfos['category_code'][] = $info->toArray();
            }
        }
        foreach ($infos as $info) {
            $data = $info->toArray();
            $results[$info['subject_sort']][$info['code']] = $data;
            $results[$info['subject_sort']][$info['code']]['infos'] = $sInfos[$info['code']] ?? [];
            $results[$info['subject_sort']][$info['code']]['sort'] = $subjectSorts[$info['subject_sort']];

        }
        return $results;
    }
}
