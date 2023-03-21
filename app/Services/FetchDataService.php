<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

use Swoolecan\Foundation\Helpers\DatetimeTool;

class FetchDataService extends AbstractService
{
    public function getSubjectInfos($params = [])
    {
        $query = $this->getModelObj('subject');
        //$infos = $query->where($params)->get();
        $infos = $query->get();
        $results = [];
        foreach ($infos as $info) {
            $info->name = $info->name;
            $results[] = $info->toArray();
        }
        return $results;
    }

    public function getGroupInfos($params = [])
    {
        $query = $this->getModelObj('group');
        $infos = $query->where($params)->get();
        $results = [];
        foreach ($infos as $info) {
            $info->name = $info->name;
            $results[] = $info->toArray();
        }
        return $results;
    }

    public function getBannerInfos($app, $position)
    {
        $query = $this->getModelObj('positionInfo');
        $count = $query->count();
        $start = rand(1, $count - 4);
        $infos = $query->where('id', '>=', $start)->limit(4)->get();
        $results = [];
        foreach ($infos as $info) {
            $attachmentInfo = $info->getAttachmentInfo(['info_field' => 'picture']);
            $result = $info->toArray();
            $result['attachmentId'] = $attachmentInfo ? $attachmentInfo['id'] : 0;
            $result['attachmentName'] = $attachmentInfo ? $attachmentInfo['name'] : 0;
            $result['attachmentUrl'] = $attachmentInfo ? $attachmentInfo['filepath'] : 0;
            $results[] = $result;
        }
        return $results;
    }

    public function getNavsortInfos($parentCode)
    {
        $model = $this->getModelObj('navsort');
        $infos = $model->where(['parent_code' => 'zhuigroup'])->orderBy('orderlist', 'asc')->get();
        $results = [];
        foreach ($infos as $info) {
            $attachmentInfo = $info->getAttachmentInfo(['info_field' => 'thumb']);
            $results[] = [
                'image' => $attachmentInfo ? $attachmentInfo['filepath'] : '',
                'link' => $info['path'],
                'title' => $info['name'],
            ];
        }
        return $results;
    }

    public function getTopicInfos($where)
    {
        $infos = $this->getModelObj('topic')->limit(30)->get();
        $results = [];
        foreach ($infos as $info) {
            $results[] = [
                'id' => $info['code'],
                'name' => $info['name'],
                'badge' => $this->getRepositoryObj('topic')->getKeyValues('badge', $info['badge']),
            ];
        }
        return $results;
    }
}
