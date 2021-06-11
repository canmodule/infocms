<?php

namespace ModuleInfocms\Controllers\Web;

class SubjectController extends Controller
{
    public function home()
    {
		$datas = [
			'title' => 'hhhh', 
			'keywords' => 'key', 
			'description' => 'description',
			'view' => 'home',
		];
        return $this->customView('home', $datas);
    }

	public function product()
	{
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'product',
		];
        return $this->customView('product', $datas);
	}

    public function store()
    {
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'store',
		];
        return $this->customView('store', $datas);
    }

	public function shop()
	{
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'shop',
		];
        return $this->customView('shop', $datas);
	}

	public function knowledge()
	{
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'knowledge',
		];
        return $this->customView('knowledge', $datas);
	}

	public function human()
	{
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'human',
		];
        return $this->customView('human', $datas);
	}

	public function info()
	{
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'info',
		];
        return $this->customView('info', $datas);
	}

	public function league()
	{
		$datas = [
			'title' => '',
			'keywords' => '',
			'description' => '',
			'view' => 'league',
		];
        return $this->customView('league', $datas);
	}
	protected function viewPath()
	{
		return 'subject';
	}
}
