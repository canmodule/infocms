<?php

declare(strict_types = 1);

namespace ModuleInfocms\Controllers;

use Framework\Baseapp\Controllers\AbstractController as AbstractControllerBase;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\FileViewFinder;
//use App\Http\Resources\UserResource;

abstract class AbstractController extends AbstractControllerBase
{

    protected function getAppcode()
    {
        return 'infocms';
    }

	protected function customView($view, $datas = [], $viewPath = null)
	{
		$viewPath = is_null($viewPath) ? $this->viewPath() : $viewPath;
		$view = $viewPath . '.' . $view;
		$viewPre = $this->viewPre();
		$datas = array_merge([
			'title' => 'title',
			'keywords' => 'keywords',
			'description' => 'description'
		], $datas);
		return view($view, ['datas' => $datas]);
	}

	protected function viewPre()
	{
		View::addLocation(app_path().'/views');
		$path = $this->resource->isMobile() === null ? '' : ($this->resource->isMobile() ? 'mobile' : 'pc');
        $path = resource_path('views') . '/' . $path;
		//$path = 'mobile';

        $paths = [$path, app_path() . '/views'];
		$finder =new FileViewFinder(App::make ('files'), $paths);
		View::setFinder ($finder);
	}

    /*public function getCurrentUser()
    {
        static $data;
        if (!empty($data)) {
            return $data;
        }
        $data = auth('api')->user();
        //$data = User::query()->where('uid', 629239)->first();
        return $data;
    }

    protected function _userInfo($user)
    {
        return new UserResource($user);
    }*/
}
