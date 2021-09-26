<?php

namespace ModuleInfocms\Controllers\Web;

class ToolController extends Controller
{
    public function tool()
    {
		$where = [];

		$sort = $this->request->input('sort');
		$sort = str_replace('_', '', $sort);

		$sortModel = $this->getPointModel('toolsort-promotion');
        $sorts = $sortModel->getGroupInfos();

		$sortData = $sortModel->getInfo($sort, 'code');
        if (empty($sortData)) {
            $pCode = '';
            $subInfos = $sorts['yunying']['subInfos'];
        } else {
            $pCode = $sortData['parent_code'] == '' ? $sort : $sortData['parent_code'];
            $subInfos = $sorts[$pCode]['subInfos'];
            $where['sort_code'] = $sortData['parent_code'] == '' ? array_keys($subInfos) : $sort;
        }
        

        $datas = [
            'sort' => $sort,
            'pCode' => $pCode,
		    'sortCodes' => empty($sortCodes) ? null : $sortCodes,
            'sortData' => $sortData,
            'subInfos' => $subInfos,
            'sorts' => $sorts,
        ];

		//$dataTdk = ['{{TAGSTR}}' => $sortData['name']];
		$this->pagesysInfo['tdkData'] = ['{{TAGSTR}}' => isset($sortData['name']) ? $sortData['name'] : 'Web线上资源'];

		return $this->render('index', $datas);




        $key = 'toolbar-datas';
        $redis = $this->getServiceObj('redis');
        $datas = $redis->get($key, true);
        if (empty($datas)) {
            $datas = $this->getToolDatas();
            $redis->set($key, $datas);
        }
        //print_r($datas);exit();
        return $this->customView('toolbar/index', ['datas' => $datas]);
    }

    protected function getToolDatas()
    {
        echo 'sssssssssssss';

        $sortModel = $this->getModelObj('bench-toolsort');
        $toolModel = $this->getModelObj('bench-toolbar');
        $firstSorts = $sortModel->where('parent_code', '')->get();
        $datas = [];
        foreach ($firstSorts as $fSort) {
            $fCode = $fSort['code'];
            $datas[$fCode] = $fSort->toArray();
            $subInfos = [];
            $subDatas = $sortModel->where('parent_code', $fCode)->get();
            foreach ($subDatas as $subData) {
                $sCode = $subData['code'];
                $subInfos[$sCode] = $subData->toArray();
                $tools = $toolModel->where(['sort' => $sCode])->get();
                $toolDatas = [];
                foreach ($tools as $tool) {
                    $toolDatas[$tool['code']] = $tool->toArray();
                }
                $subInfos[$sCode]['tools'] = $toolDatas;
            }
            $datas[$fCode]['subInfos'] = $subInfos;
        }

        return $datas;
    }

	protected function viewPath()
	{
		return 'human';
	}

	public function isMobile()
	{
		return null;
	}
}
