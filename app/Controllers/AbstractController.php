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
