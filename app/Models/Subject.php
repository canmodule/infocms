<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Subject extends AbstractModel
{
    protected $table = 'subject';
    protected $primaryKey = 'code';
    public $incrementing = false;

    /*public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }*/

    public function getGroupCodeAttribute()
    {
        $infos = $this->getGroupDatas();
        \Log::debug($infos);
        $str = '';
        foreach ($infos as $info) {
            if ($info->groupInfo) {
                $str .= "{$info->groupInfo->name} ; ";
            }
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
        if (is_null($groupCodes)) {
            return true;
        }
        $this->getModelObj('groupSubject')->where('subject_code', $this->code)->delete();
        foreach ((array) $groupCodes as $groupCode) {
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
