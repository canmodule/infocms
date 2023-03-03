<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Subject extends AbstractModel
{
    protected $table = 'subject';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }

    public function getGroupCodeAttribute()
    {
        $infos = $this->getGroupDatas();
        $str = '';
        foreach ($infos as $info) {
            $str .= "{$info->groupInfo->name} ; ";
        }
        return trim($str, ' ; ');
    }

    public function getGroupDatas()
    {
        return $this->getModelObj('groupSubject')->where('subject_code', $this->code)->get();
    }

    public function afterSave()
    {
        $request = request();
        $groupCodes = $request->input('group_code');
        \Log::debug('ssssubject-' . gettype($groupCodes));
        if (is_null($groupCodes)) {
            return true;
        }
        $this->getModelObj('groupSubject')->where('subject_code', $this->code)->delete();
        foreach ($groupCodes as $groupCode) {
            $nData = ['subject_code' => $this->code, 'group_code' => $groupCode];
            $exist = $this->getModelObj('groupSubject')->where($nData)->withTrashed()->first();
            if (!empty($exist)) {
                $exist->restore();
                continue;
            }
            $this->getModelObj('groupSubject')->create($nData);
        }

        return true;
    }
}
