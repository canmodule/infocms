<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class ResourceDetailRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'filepath', 'tag', 'filename', 'mime_type', 'extension', 'size', 'file_date_time', 'last_modify', 'last_at', 'image_width', 'image_length', 'image_model', 'exif_data', 'created_at', 'updated_at', 'old_id', 'extfield', 'extfield1'],
            'listSearch' => ['id', 'name'],
            'add' => ['name'],
            'update' => ['name'],
        ];
    }

    public function getShowFields()
    {
        return [
            //'type' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            //'type' => ['type' => 'select'],
        ];
    }

    public function getFormFields()
    {
        return [
            //'type' => ['type' => 'select'],
        ];
    }

    protected function _statusKeyDatas()
    {
        return [
            0 => '未激活',
            1 => '使用中',
            99 => '锁定',
        ];
    }
}
