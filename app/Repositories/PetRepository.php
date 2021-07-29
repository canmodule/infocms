<?php
declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class PetRepository extends AbstractRepository
{
    public function getShowFields()
    {
        return [
        ];
    }

    public function getSearchFields()
    {
        return [
            'status' => ['type' => 'select', 'infos' => $this->getKeyValues('status')],
            'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
            'is_master' => ['type' => 'select', 'infos' => $this->getKeyValues('is_master')],
        ];
    }

    public function getFormFields()
    {
        return [
            'status' => ['type' => 'select', 'infos' => $this->getKeyValues('status')],
            'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
            'is_master' => ['type' => 'select', 'infos' => $this->getKeyValues('is_master')],
        ];
    }

    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name', 'code', 'type', 'title', 'description', 'status', 'is_master'],
            'listSearch' => ['id', 'name', 'code', 'type', 'status'],
            'add' => ['code', 'name', 'type', 'title', 'description', 'status', 'is_master'],
            'update' => ['code', 'name', 'type', 'title', 'description', 'status', 'is_master'],
        ];
    }

    protected function _typeKeyDatas()
    {
        return [
            'figure' => '体型',
            'feature' => '特性',
            'flur' => '毛色',
            'sort' => '类别',
        ];
    }

    protected function _statusKeyDatas()
    {
        return [
            0 => '未激活',
            1 => '使用中',
            99 => '锁定',
        ];
    }

    protected function _isMasterKeyDatas()
    {
        return [
            0 => '普通分类',
            1 => '主分类',
        ];
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    /*public function model()
    {
        return Pet::class;
    }*/

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    /*public function validator()
    {
        return PetValidator::class;
    }*/

    /**
     * Boot up the repository, pushing criteria
     */
    /*public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }*/

    /*public function presenter()
    {
        return PetPresenter::class;
    }*/
}
