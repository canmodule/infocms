<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

use Swoolecan\Foundation\Helpers\DatetimeTool;

class FetchDataService extends AbstractService
{
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

[
                [
                    'id' => 29,
                    'name' => '追格',
                    'badge' => '推荐',
                ],
                [
                    'id' => 25,
                    'name' => '咖啡',
                    'badge' => '',
                ],
                [
                    'id' => 9,
                    'name' => '人人都是美食家',
                    'badge' => NULL,
                ],
                [
                    'id' => 21,
                    'name' => '视频',
                    'badge' => NULL,
                ],
                [
                    'id' => 20,
                    'name' => '小功能',
                    'badge' => 'HOT',
                ],
                [
                    'id' => 7,
                    'name' => '慢生活 漫时光',
                    'badge' => NULL,
                ],
                [
                    'id' => 68,
                    'name' => '追格小程序',
                    'badge' => '',
                ],
                [
                    'id' => 19,
                    'name' => '镜头下的时光大美人',
                    'badge' => 'HOT',
                ],
                [
                    'id' => 24,
                    'name' => '每日打卡',
                    'badge' => '',
                ],
                [
                    'id' => 18,
                    'name' => '宠物',
                    'badge' => NULL,
                ],
                [
                    'id' => 69,
                    'name' => '夜景',
                    'badge' => '',
                ],
            ]
}
