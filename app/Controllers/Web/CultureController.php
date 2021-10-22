<?php 
namespace ModuleInfocms\Controllers\Web;

use Swoolecan\Foundation\Helpers\CommonTool;

class CultureController extends Controller
{
    public function home($sort = 'pingtai')
    {
        $datas = [];
        return $this->customView('home', ['datas' => $datas]);
    }

    public function category()
    {
        $datas = [];
        return $this->customView('category', ['datas' => $datas]);
    }

    public function bookDetail()
    {
        $datas = [];
        return $this->customView('book-detail', ['datas' => $datas]);
    }

    public function bookHome()
    {
        $datas = [];
        return $this->customView('book-home', ['datas' => $datas]);
    }

    public function bookList()
    {
        $datas = [];
        return $this->customView('book-list', ['datas' => $datas]);
    }

    public function channel()
    {
        $datas = [];
        return $this->customView('channel', ['datas' => $datas]);
    }

    public function collection()
    {
        $datas = [];
        return $this->customView('collection', ['datas' => $datas]);
    }

    public function figure()
    {
        $datas = [];
        return $this->customView('figure', ['datas' => $datas]);
    }

    public function shelf()
    {
        $datas = [];
        return $this->customView('shelf', ['datas' => $datas]);
    }

    public function store()
    {
        $datas = [];
        return $this->customView('store', ['datas' => $datas]);
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
		return 'culture';
	}

	public function isMobile($force = false)
	{
        if (empty($force)) {
		    return null;
        }
        return parent::isMobile($force);
	}
}
