<?php

namespace ModuleInfocms\Controllers\Web;

use Swoolecan\Foundation\Helpers\CommonTool;

class NavigationController extends Controller
{
    public function home()
    {
        $navInfos = $this->getNavigationDatas('nav');
        $positionModel = $this->getModelObj('bench-position');
        $datas = [
            'categorys' => $this->getModelObj('bench-navsort')->getCategoryDatas(4),
            'searchElems' => $this->getSearchElems(),
            'homeFocus' => $positionModel->getFocusDatas('home'),
            'recommendDatas' => $positionModel->getPointDatas('home'),
            'mobileDatas' =>  array_chunk($positionModel->getMobileListDatas('home'), 6),
            'homeButtoms' => $positionModel->getPointDatas('bottompc'),
            'mobileBottom' => $positionModel->getPointDatas('bottommobile'),
            'homeRandoms' => $positionModel->getPointDatas('bottomrandom'),
        ];
        $datas['tdkData'] = [
            'title' => '定制自己的网络导航,驾驭浩瀚的网络信息',
            'keywords' => '',
            'description' => '',
        ];
        //print_r($datas['mobileTop']);exit();
        return $this->customView('home', array_merge($navInfos, $datas));
    }

    public function rank()
    {
        $datas = [
            'categorys' => $this->getModelObj('bench-navsort')->getCategoryDatas(),
        ];
        $datas['tdkData'] = [
            'title' => '可定制的网络热搜，网络排行榜',
            'keywords' => '',
            'description' => '',
        ];
        //print_r($datas);exit();
        return $this->customView('rank', $datas);
    }

    public function search()
    {
        $this->dealData();exit();
        $recommendDatas = $this->getModelObj('bench-position')->getPointDatas('search');
        $focusDatas = $this->getModelObj('bench-position')->getFocusDatas('search');
        $mobileDatas = array_chunk($this->getModelObj('bench-position')->getMobileListDatas('search'), 6);

        $datas = [
            'pcDatas' => $recommendDatas, 
            'mobileDatas' => $mobileDatas, 
            'searchHots' => $focusDatas, 
            'searchElems' => $this->getSearchElems(),
        ];
        $datas['tdkData'] = [
            'title' => '多维度搜索，搜索聚合',
            'keywords' => '',
            'description' => '',
        ];
        return $this->customView('search', $datas);
    }

    public function coolsite()
    {
        $datas = $this->getNavigationDatas('coolsite');
        $datas['tdkData'] = [
            'title' => $datas['bigSort']['name'],
            'keywords' => '',
            'description' => '',
        ];
        return $this->customView('coolsite', $datas);
    }

    public function subnav($sort)
    {
        $datas = $this->getNavigationDatas($sort);
        $datas['tdkData'] = [
            'title' => $datas['bigSort']['name'],
            'keywords' => '',
            'description' => '',
        ];
        return $this->customView('subnav', $datas);
    }

    protected function getNavigationDatas($bigSort)
    {
        $model = $this->getModelObj('bench-navsort');
        $positionModel = $this->getModelObj('bench-position');
        $bigSortData = $model->where(['code' => $bigSort])->first();
        $sorts = $model->where(['parent_code' => $bigSort])->get();
        $results = [];
        foreach ($sorts as $sort) {
            $sData = $sort->toArray();
            $sData['navDatas'] = $sort->getWebsiteDatas();
            $sData['focusDatas'] = $positionModel->getSortFocusDatas($sort['code']);
            $results[$sort['code']] = $sData;
            //print_r($sData);exit();
        }
        $recommendDatas = $this->getModelObj('bench-position')->getPointDatas($bigSort);
        $focusDatas = $this->getModelObj('bench-position')->getFocusDatas($bigSort);
        $categorys = $this->getModelObj('bench-navsort')->getCategoryDatas();
        $mobileLists = $this->getModelObj('bench-position')->getMobileListDatas($bigSort);
        if (count($mobileLists) > 0) {
            $mobileLists = array_chunk($mobileLists, 6);
        }
        return [
            'currentSort' => $bigSort, 
            'bigSort' => $bigSortData, 
            'mobileLists' => $mobileLists,
            'recommendDatas' => $recommendDatas, 
            'sorts' => $results, 
            'categorys' => $categorys,
            'focusDatas' => $focusDatas,
        ];
    }

	protected function viewPath()
	{
		return 'navigation';
	}

	public function isMobile($force = false)
	{
        if (empty($force)) {
		    return null;
        }
        return parent::isMobile($force);
	}

    protected function getSearchElems()
    {
        return [
            'baidu' => ['name' => '百度', 'url' => 'https://www.baidu.com/s', 'formName' => 'wd', 'ssid' => 'bgss1'],
            'sougou' => ['name' => '搜狗', 'url' => 'https://www.sogou.com/web?query=', 'withOpen' => 1, 'ssid' => 'bgss2'],
            'bing' => ['name' => '必应', 'url' => 'https://cn.bing.com/search', 'formName' => 'q', 'ssid' => 'bgss3'],
            'google' => ['name' => '谷歌', 'url' => 'https://www.google.com/search', 'formName' => 'q', 'ssid' => 'bgss5'],
            'study' => ['name' => '学术', 'url' => 'https://xueshu.baidu.com/s', 'formName' => 'wd', 'ssid' => 'bgss12'],
            'fanyi' => ['name' => '翻译', 'url' => 'https://cn.bing.com/dict/search?q=', 'withOpen' => 1, 'ssid' => 'bgss37'],
            'jd' => ['name' => '京东', 'url' => 'https://search.jd.com/Search?enc=utf-8&keyword=', 'withOpen' => 1, 'ssid' => 'bgss8'],
            'taobao' => ['name' => '淘宝', 'url' => 'https://s.taobao.com/search?', 'formName' => 'q', 'ssid' => 'bgss6'],
            //'tianmao' => ['name' => '天猫', 'url' => 'https://s.taobao.com/search?', 'formName' => 'q', 'ssid' => 'bgss7'],
            'weixin' => ['name' => '微信', 'url' => 'https://weixin.sogou.com/weixin?type=2&ie=utf8&query=', 'withOpen' => 1, 'ssid' => 'bgss19'],
            'zhihu' => ['name' => '知乎', 'url' => 'https://www.zhihu.com/search', 'formName' => 'q', 'ssid' => 'bgss17'],
            'weibo' => ['name' => '微博', 'url' => 'https://s.weibo.com/weibo/', 'withOpen' => 1, 'ssid' => 'bgss16'],
            'meitu' => ['name' => '美图', 'url' => 'https://huaban.com/search?q=', 'formName' => 'q', 'ssid' => 'bgss40'],
            'pan' => ['name' => '网盘', 'url' => 'http://www.pan58.com/s?page=1&wd=', 'withOpen' => 1, 'ssid' => 'bgss'],
            'movie' => ['name' => '视频', 'url' => 'https://search.bilibili.com/all?keyword=', 'withOpen' => 1, 'ssid' => 'bgss29'],
            'music' => ['name' => '音乐', 'url' => 'https://www.kugou.com/yy/html/search.html#searchType=song&searchKeyWord=', 'withOpen' => 1, 'ssid' => 'bgss24'],
        ];
    }

    protected function dealData()
    {
        $websiteModel = $this->getModelObj('bench-website');
        $positionInfoModel = $this->getModelObj('bench-positionInfo');
        $toolbarModel = $this->getModelObj('bench-toolbar');
        $navModel = $this->getModelObj('bench-navigation');
        $navsortModel = $this->getModelObj('bench-navsort');
        $navsortInfoModel = $this->getModelObj('bench-navsortInfo');

        $navsorts = $navsortModel->get();
        foreach ($navsorts as $navsort) {
            $code = $navsort['code'];
            $name = $navsort['name'];
            if (strpos($name, ' ') !== false) {
                if ($navsort['parent_code'] == 'nav') {
                    //continue;
                }
                $name = str_replace([' 更多>', ' / '], ['', '/'], $name);

                list($name, $description) = explode(' ', $name);
                echo $navsort['parent_code'] . '-----' . $name . '===' . $navsort['name'] . "<br />";

                $navsort->name = trim($name);
                $navsort->description = $navsort['name'];
                $navsort->save();
            }
        }
        exit();


        /*$infos = [];//require('/tmp/text/navdatas.php');
        $infos['ext'] = require('/tmp/text/navext.php');
        foreach ($infos as $key => $value) {
            //if ($key == 'searchElems') {
            //if (!in_array($key, ['ext', 'mobileSearchs'])) {
            if (true) {//!in_array($key, ['ext'])) {
                continue;
            }
            $i = 10000;
            foreach ($value as $iKey => $info) {
                if ($iKey < 48) {
                    continue;
                }
                $wInfo = $websiteModel->where(['url' => $info['url']])->first();
                if (!empty($wInfo)) {
                    $piData = [
                        'class_style' => '',
                        'title' => $info['name'],
                        'position_code' => 'readnavmobilelist',
                        'info_type' => 'website',
                        'icon' => $info['icon'] ?? '',
                        'icon_color' => $info['iColor'] ?? '',
                        'info_id' => $wInfo['id'],
                        'orderlist' => $i,
                    ];
                    $positionInfoModel->create($piData);
                    $i--;
                    echo 'ddddddddd';
                } else {
                    $wData = ['name' => $info['name'], 'logo_path' => $info['logo_path'] ?? '', 'url' => $info['url']];
                    //$websiteModel->create($wData);
                print_r($info);
                }
            }
        }*/
        exit();
        $sortDatas = $model->get();
        $positionModel = $this->getModelObj('bench-position');
        $sortDatas = $sortDatas->keyBy('code')->toArray();
        foreach ($sortDatas as $key => $info) {
            //if ($info['parent_code'] . 'tj' == $info['code']) {
                /*$pData = [
                    'code' => $info['parent_code'],
                    'name' => $sortDatas[$info['parent_code']]['name'] . $info['name'],
                    'description' => $info['description'],
                ];
                $pResult = $positionModel->create($pData);*/
                $navDatas = $navModel->where('sort', $info['code'])->get()->toArray();
                foreach ($navDatas as $nData) {
                    $website = $websiteModel->where('url', $nData['website'])->first();
                    /*$piData = [
                        'position_code' => $info['parent_code'],
                        'info_type' => 'website',
                        'info_id' => $website['id'],
                        'orderlist' => $nData['orderlist'],
                    ];
                    $positionInfoModel->create($piData);*/
                    /*$siData = [
                        'navsort_code' => $info['code'],
                        'title' => $nData['name'],
                        'info_id' => $website['id'],
                        'orderlist' => $nData['orderlist'],
                    ];
                    $sortInfoModel->create($siData);*/
                }
            //}
        }
        exit();



        /*$infos = $websiteModel->get();
        $i = 0;
        foreach ($infos as $info) {
            $url = $info['url'];
            if ($info['extfield'] <= 1) {
                continue;
            }
            if ($info['logo_path'] != '') {
                $navDatas = $navModel->where('website', $url)->get()->toArray();
                foreach ($navDatas as $navData) {
                    if (empty($navData['extfield'])) {
                        continue;
                    }
                    if ($info['logo_path'] != $navData['extfield']) {
                        echo "<a href='{$info['url']}' target='_blank'>{$info['name']}</a>" . '---' . "<img src='http://39.106.102.45/filesys/spider/pages{$info['logo_path']}' />" . '===' . "<img src='http://39.106.102.45/filesys/spider/pages{$navData['extfield']}' />UPDATE `wp_website` SET `logo_path` = '{$navData['extfield']}' WHERE `id` = {$info['id']};<br />";
                        //print_r($info->toArray());
                        //print_r($navData);
                        //echo '<br />' . "\n";
                    }

                    //$info->logo_path = $navData['extfield'];
                    //$info->logo_type = $navData['logo_type'];
                    //$info->save();
                }
            }
        }
        echo $i;*/
        exit();
    }
}
