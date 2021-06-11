<?php

declare(strict_types = 1);

namespace ModuleInfocms\Models;

use Framework\Baseapp\Models\AbstractModel as AbstractModelBase;

class AbstractModel extends AbstractModelBase
{
    protected $connection = 'infocms';

    public function formatContent()
    {
        $content = $this->getOriginal('content');
        $domain = $this->resource->getPointDomain('uploadUrl');
        $content = str_replace('src="upload', 'src="' . $domain . 'upload', $content);
        return $content;
    }

    public function getSingleAttachment($field)
    {
        $attachment = $this->getPointModel('attachment');
        $where = [
            'info_field' => $field,
            'info_id' => $this->id,
            'info_table' => $this->getTable(),
        ];
        $info = $attachment->where($where)->first();
        if (empty($info)) {
            return [];
        }
        return $info;
    }

    public function pointAttachmentUrl($field)
    {
        $info = $this->getSingleAttachment($field);
        return empty($info) ? '' : $info->url;
    }

    public function getMulAttachment($field)
    {
        $attachment = $this->getPointModel('attachment');
        $where = [
            'info_field' => $field,
            'info_id' => $this->id,
            'info_table' => $this->getTable(),
        ];
        $infos = $attachment->where($where)->get();
        if (empty($info)) {
            return [];
        }
        return $infos;
    }

    protected function getAppcode()
    {
        return 'infocms';
    }
}
