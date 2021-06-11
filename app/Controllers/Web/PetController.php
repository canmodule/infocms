<?php

namespace ModuleInfocms\Controllers\Web;

class PetController extends Controller
{
    public function home()
    {
		$datas = [
			'title' => 'title',
			'keywords' => 'keywords',
			'description' => 'description',
			'view' => 'home',
		];
        return $this->customView('home', $datas);
    }

    public function specialList()
    {
        return $this->customView('speciallist');
    }

    public function specialShow()
    {
        return $this->customView('specialshow');
    }

    public function infoHome()
    {
        return $this->customView('infosort', ['view' => 'infohome']);
    }

    public function infoList()
    {
        return $this->customView('infolist', ['view' => 'infolist']);
    }

    public function infoShow($id)
    {
        $model = $this->getModelObj('petArticle');
        $info = $model->find($id);
        if (empty($info)) {
            echo 'info no exist';exit();
        }
        $datas = [
            'view' => 'infodetail',
            'title' => $info['name'],
            'description' => $info['description'],
            'keyword' => $info['tag'],
            'info' => $info,
        ];
        return $this->customView('cmsshow', $datas);
    }

    public function petHome()
    {
        return $this->customView('home', ['view' => 'pethome']);
    }

    public function petList()
    {
        return $this->customView('petlist', ['view' => 'petlist']);
    }

    public function petShow()
    {
        return $this->customView('petshow', ['view' => 'petdetail']);
    }

	protected function viewPath()
	{
		return 'petcms';
	}
}
