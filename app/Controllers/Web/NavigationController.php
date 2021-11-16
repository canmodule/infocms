<?php

namespace ModuleInfocms\Controllers\Web;

use Swoolecan\Foundation\Helpers\CommonTool;

class NavigationController extends Controller
{
    public function home()
    {
        $infos = require('/tmp/text/navdatas.php');
        $datas = $this->getNavigationDatas('nav');
        $datas['recommendDatas']['navDatas'] = $this->getModelObj('bench-navigation')->where(['sort' => 'designtj', 'only_mobile' => 0])->orderBy('orderlist', 'desc')->limit(7)->get();
        $datas['mobileTop'] = array_chunk(array_slice($infos['mobileSearchs'], 0, 12), 6);
        $datas['mobileBottom'] = array_slice($infos['mobileSearchs'], -6, 6);
        $datas['homeRandoms'] = $infos['homeRandoms'];
        $datas['homeButtoms'] = $infos['homeButtoms'];
        $datas['searchElems'] = $infos['searchElems'];
        $datas['categorys'] = $this->getModelObj('bench-navsort')->getCategoryDatas(4);
        $datas['mobileDatas'] = array_chunk(array_slice($infos['mobileSearchs'], 0, 12), 6);
        return $this->customView('home', $datas);
    }

    public function rank()
    {
        $datas = [];
        return $this->customView('rank', ['datas' => $datas]);
    }

    public function search()
    {
        $this->dealData();exit();
        $pcDatas = $this->getModelObj('bench-navigation')->where(['sort' => 'searchtj', 'only_mobile' => 0])->orderBy('orderlist', 'desc')->get();
        $mobileDatas = $this->getModelObj('bench-navigation')->where(['sort' => 'searchtj', 'only_mobile' => 1])->orderBy('orderlist', 'desc')->get();
        $infos = require('/tmp/text/navdatas.php');
        $mobileDatas = array_chunk(array_slice($infos['mobileSearchs'], 0, 12), 6);
        $datas = ['pcDatas' => $pcDatas, 'mobileDatas' => $mobileDatas, 'searchHots' => $searchHots, 'searchElems' => $infos['searchElems'], 'elems' => json_encode($infos['searchElems'])];
        return $this->customView('search', $datas);
    }

    public function coolsite()
    {
        $datas = $this->getNavigationDatas('coolsite');
        return $this->customView('coolsite', $datas);
    }

    public function subnav($sort)
    {
        $datas = $this->getNavigationDatas($sort);
        return $this->customView('subnav', $datas);
    }

    protected function getNavigationDatas($bigSort)
    {
        $model = $this->getModelObj('bench-navsort');
        $nModel = $this->getModelObj('bench-navigation');
        $bigSortData = $model->where(['code' => $bigSort])->first();
        $sorts = $model->where(['parent_code' => $bigSort])->get();
        $results = [];
        foreach ($sorts as $sort) {
            $sData = $sort->toArray();
            $sData['navDatas'] = $sort->getWebsiteDatas();
            $results[$sort['code']] = $sData;
            //print_r($sData);exit();
        }
        $recommendDatas = $this->getModelObj('bench-position')->getRecommendDatas($bigSort);
        $focusDatas = $this->getModelObj('bench-position')->getFocusDatas($bigSort);
        $categorys = $this->getModelObj('bench-navsort')->getCategoryDatas();
        return [
            'currentSort' => $bigSort, 
            'bigSort' => $bigSortData, 
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

    protected function dealData()
    {
        $websiteModel = $this->getModelObj('bench-website');
        $toolModel = $this->getModelObj('bench-toolbar');
        $navModel = $this->getModelObj('bench-navigation');
        $model = $this->getModelObj('bench-navsort');
        $sortInfoModel = $this->getModelObj('bench-navsortInfo');
        $sortDatas = $model->get();
        $positionModel = $this->getModelObj('bench-position');
        $positionInfoModel = $this->getModelObj('bench-positionInfo');
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
