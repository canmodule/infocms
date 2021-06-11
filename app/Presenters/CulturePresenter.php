<?php

namespace ModuleInfocms\Presenters;

use Swoolecan\Foundation\Helpers\CommonTool;

/**
 * Class CulturePresenter.
 *
 * @package namespace ModuleInfocms\Presenters;
 */
class CulturePresenter extends AbstractPresenter
{
    public function getCategoryDatas()
    {
        $datas = $this->getModelObj('cultureCategory')->get();
        $datas = $datas->keyBy('code');
        return $datas;
    }

    public function getCategoryTrees($parent = '')
    {
        $datas = $this->getCategoryDatas();
        $result = CommonTool::createTree($datas, $parent);

        return $result;
    }
}
