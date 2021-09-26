<?php

namespace ModuleInfocms\Controllers\Web;

use Swoolecan\Foundation\Helpers\CommonTool;

class ToolController extends Controller
{
    public function tool($sort = '')
    {
        $sortModel = $this->getModelObj('bench-toolsort');
        $sorts = $sortModel->get()->toArray();
        $sorts = CommonTool::createTree($sorts, '');

		$sortData = $sortModel->where('code', $sort)->first();
        if (empty($sortData)) {
            $pCode = '';
            $subInfos = $sorts['yunying']['subInfos'];
        } else {
            $pCode = $sortData['parent_code'] == '' ? $sort : $sortData['parent_code'];
            $subInfos = $sorts[$pCode]['subInfos'];
        }

        $subInfos = $this->getToolDatas($subInfos);
        $datas = [
            'sort' => $sort,
            'pCode' => $pCode,
		    'sortCodes' => empty($sortCodes) ? null : $sortCodes,
            'sortData' => $sortData,
            'subInfos' => $subInfos,
            'sorts' => $sorts,
        ];

		//$dataTdk = ['{{TAGSTR}}' => $sortData['name']];
		//$this->pagesysInfo['tdkData'] = ['{{TAGSTR}}' => isset($sortData['name']) ? $sortData['name'] : 'Web线上资源'];

		//return $this->render('index', $datas);
        return $this->customView('toolbar/index', ['datas' => $datas]);

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

    protected function getToolDatabaks()
    {
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

    protected function getToolDatas($subInfos)
    {
        $toolModel = $this->getModelObj('bench-toolbar');
        foreach ($subInfos as $sCode => & $sInfo) {
            $tools = $toolModel->where(['sort' => $sCode])->get();
            $toolDatas = [];
            foreach ($tools as $tool) {
                $toolDatas[$tool['code']] = $tool->toArray();
            }
            $sInfo['tools'] = $toolDatas;
        }
        return $subInfos;
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
