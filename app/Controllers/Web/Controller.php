<?php

namespace ModuleInfocms\Controllers\Web;

use ModuleInfocms\Controllers\AbstractController;

class Controller extends AbstractController
{
    public function _listCommon($params, $view, $repositoryCode, $module)
    {
        $repository = $this->getPointRepository($modelCode, $module);
        $info = $model->find($id);
        $lists = $this->repository->paginate(null, ['*']);
        if (empty($info)) {
            echo 'info no exist';exit();
        }
        //print_R($info);
        $datas = [
            'view' => $view,
            'title' => $info['name'],
            'description' => $info['description'],
            'keyword' => $info['tag'],
            'info' => $info,
        ];
        return $this->customView($view, $datas);
    }

    public function _showCommon($id, $view, $modelCode, $module)
    {
        $model = $this->getModelObj($modelCode);
        $info = $model->find($id);
        if (empty($info)) {
            echo 'info no exist';exit();
        }
        //print_R($info);
        $datas = [
            'view' => $view,
            'title' => $info['name'],
            'description' => $info['description'],
            'keyword' => $info['tag'],
            'info' => $info,
        ];
        return $this->customView($view, $datas);
    }
}
