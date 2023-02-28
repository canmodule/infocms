<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

use Framework\Baseapp\Repositories\AbstractRepository as AbstractRepositoryBase;

/**
 * Class AbstractRepository
 */
class AbstractRepository extends AbstractRepositoryBase
{
    protected function getAppcode()
    {
        return 'infocms';
    }

    protected function _badgeKeyDatas()
    {
        return [
            'hot' => 'HOT',
            'recommend' => '推荐',
            'look' => '看看',
        ];
    }

    public function dealTagData($tag)
    {
    }
}
