<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

use Framework\Baseapp\Repositories\AbstractRepository as AbstractRepositoryBase;

/**
 * Class AbstractRepository
 */
class AbstractRepository extends AbstractRepositoryBase
{
    public function _calligraphyStyleKeyDatas()
    {
        return [
            'seal' => '篆',
            'a' => '',
            'offical' => '隶',
            'cursive' => '草',
            'running' => '行',
            'regular' => '楷',
        ];
    }

    public function _dynastyKeyDatas()
    {
        return [
            'preqin' => '先秦',
            'qinhan' => '秦汉',
            'weijin' => '魏晋南北朝',
            'suitang' => '隋唐五代',
            'b' => '',
            'songlj' => '宋辽金',
            'yuan' => '元',
            'ming' => '明',
            'qing' => '清',
            'modern' => '近现代',
            'contemporary' => '当代',
            'union' => '合辑',

        ];
    }

    protected function getAppcode()
    {
        return 'infocms';
    }

    public function tmpThumb($model, $field = '', $pointField = 'extfield')
    {
        $url = $model->$pointField;
        $url = strpos($url, 'htt') !== false ? $url : 'https://zsbt-1254153797.cos.ap-shanghai.myqcloud.com/' . $url;
        if (strpos($url, '?') !== false) {
            $url = substr($url, 0, strpos($url, '?'));
        }
        if ($field == 'url') {
            return $url;
        }

        return "<a href='{$url}' target='_blank'><img src='{$url}' width='150px' height='150px' /></a>";
    }
}
