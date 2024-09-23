<?php
declare(strict_types = 1);

namespace ModuleInfocms\Services;

use Swoolecan\Foundation\Helpers\DatetimeTool;

trait SubjectDataTrait
{
    public function getFigureDetail($figureCode)
    {
        $info = $this->getModelObj('group')->where(['code' => $figureCode])->first();
        if (empty($info)) {
            return $this->resource->throwException(400, '信息不存在-' . $figureCode);
        }
        $figure = $this->getModelObj('culture-figure')->where(['code' => $figureCode])->first();
        $titles = $figure->getFtitleDatas();
        $birthData = $figure->getBirthDeath();
        //print_r($birthData);
        //print_r($titles);

        $detail = [
            'user' => [
                'user_id' => 1,
                'avatar' => $figure ? $figure->photoUrl : 'https://q.zhuige.com/wp-content/uploads/2022/07/1.png',
                'nickname' => $info['name'],
                'titles' => $titles,
                'birthData' => $birthData,
                'brief' => $figure ? $figure['description'] : '',
                'cover' => $this->getRandBackground(),
                'is_me' => 0,
                'is_follow' => 0,
                'is_fans' => 0,
                'delete_topic' => 0,
                'delete_vote' => 0,
                'delete_business_card' => 0,
                'delete_idle_shop' => 0,
            ],
            'rec_ad' => $this->hotDatas(),
            'btn_message' => 1,
            'btn_promotion' => 1,
            'tab_idle' => 1,
            'tabs' => $this->figureMenus(),
        ];
        return $detail;
    }

    public function getGroupDetail($groupCode)
    {
        $info = $this->getModelObj('group')->where(['code' => $groupCode])->first();
        if (empty($info)) {
            return $this->resource->throwException(400, '信息不存在-' . $groupCode);
        }

        $detail = [
            'users' => [],
            'id' => $info['id'],
            'name' => $info['name'],
            'brief' => $info['brief'],
            'user_count' => rand(100, 10000),
            'post_count' => rand(100, 5000),
            'is_follow' => rand(0, 1),
            'is_owner' => rand(0, 1),
            'logo' => $info['logo'] ?: 'http://39.106.102.45/resource/knowledge/history/%E5%8F%B2%E5%89%8D%E6%96%87%E6%98%8E/%E7%9F%B3%E5%99%A8%E6%97%B6%E4%BB%A3-%E9%99%B6%E9%B8%9F.png',
            'background' => $this->getRandBackground(),
            'description' => $info['description'],
            'ad_link' => [
                'title' => '追格小程序安装文档、常见问题',
                'link' => 'https://www.zhuige.com/docs/cat/39.html',
            ],
            'ad_custom' => $this->hotDatas(),
            'groupMenus' => $this->groupMenus(),
            'ad_imgs' => $this->hotDatas(),
        ];
        return $detail;
    }

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

    public function getRandBackground()
    {
        $num = [1, 2, 3, 4, 6][rand(0, 4)];
        return 'http://39.106.102.45/resource/knowledge/common/%E8%83%8C%E6%99%AF%E5%9B%BE-' . $num . '.jpg';
    }

    public function groupMenus()
    {
        $datas = [
            ['title' => '图表', 'route' => '/pages/knowledge/graphic'],
            ['title' => '文章', 'route' => '/pages/knowledge/'],
            ['title' => '人物', 'route' => '/pages/knowledge/'],
            ['title' => '事件', 'route' => '/pages/knowledge/'],
        ];
        return $datas;
    }

    public function figureMenus()
    {
        $datas = [
            ['id' => 'biography', 'title' => '生平'],
            ['id' => 'graphic', 'title' => '图说'],
            ['id' => 'work', 'title' => '著作'],
            ['id' => 'article', 'title' => '文章'],
            ['id' => 'mimiarticle', 'title' => '帖子'],
        ];
        return $datas;
    }

    public function hotDatas()
    {
        return [
            'title' => ['热门信息', '推荐信息', '圈内推荐'][rand(0, 2)],
            'items' => [
                [
                    'title' => '本代码下载',
                    'badge' => 'Hot',
                    'image' => 'https://q.zhuige.com/wp-content/uploads/2022/09/marjan-blan-marjanblan-k06giuMSd6s-unsplash-750x536-1.jpg',
                    'link' => 'https://www.zhuige.com/product/zg.html',
                    'price' => '￥0.00',
                ],
                [
                    'title' => '安装/帮助文档',
                    'badge' => '',
                    'image' => 'https://q.zhuige.com/wp-content/uploads/2022/09/velizar-ivanov-9bFLTsaP_xo-unsplash-350x250-1.jpg',
                    'link' => 'https://www.zhuige.com/docs.html',
                    'price' => '→ 看看',
                ],
                [
                    'title' => '追格小程序（全模块）',
                    'badge' => '推荐',
                    'image' => 'https://q.zhuige.com/wp-content/uploads/2022/09/manny-moreno-Wxq7U4jaPfM-unsplash-350x250-1.jpg',
                    'link' => 'https://www.zhuige.com/product/zgxcx.html',
                    'price' => '￥6800',
                ],
                [
                    'title' => '插件模块市场',
                    'badge' => '',
                    'image' => 'https://q.zhuige.com/wp-content/uploads/2022/09/tt.jpg',
                    'link' => 'https://www.zhuige.com/product.html?cat=24',
                    'price' => '￥19.9起',
                ],
            ],
        ];
    }
}
