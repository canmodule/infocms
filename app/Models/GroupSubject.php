<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class GroupSubject extends AbstractModel
{
    use SoftDeletes;
    protected $table = 'group_subject';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function groupInfo()
    {
        return $this->hasOne(Group::class, 'code', 'group_code');
    }

    public function subjectInfo()
    {
        return $this->hasOne(Subject::class, 'code', 'subject_code');
    }
}
