<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

class Course extends AbstractModel
{
    protected $table = 'course';
    protected $guarded = ['id'];

    public function createSectionLessons()
    {
        print_r($this->toArray());
        $cNum = 1;//rand(2, 3);
        for ($i = 1; $i <= $cNum; $i++) {
            $sNum = rand(5, 7);
            $cData = [
                'course_id' => $this->id,
                'orderlist' => $i,
                'lesson_num' => $sNum,
                'name' => "第{$i}章 {$this->name}",
            ];
            $cInfo = $this->getModelObj('section')->create($cData);
            for ($j = 1; $j <= $sNum; $j++) {
                $sData = [
                    'course_id' => $this->id,
                    'section_id' => $cInfo['id'],
                    'orderlist' => $j,
                    'name' => "第{$j}节 {$this->name}-{$cInfo['name']}",
                ];
                $lInfo = $this->getModelObj('lesson')->create($sData);
            }
        }
        return true;
    }
}
