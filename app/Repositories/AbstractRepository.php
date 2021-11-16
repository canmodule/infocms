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
}
