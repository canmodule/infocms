<?php

namespace ModuleInfocms\Resources;

class GoodsAttributeCollection extends AbstractCollection
{

    protected function _goodsArray()
    {
        //$addFormFields = $this->repository->getFormatFormFields('add');
        //$updateFormFields = $this->repository->getFormatFormFields('update');
        return [
            'data' => $this->collection,
            'fieldNames' => $this->repository->getAttributeNames($this->getScene()),
            //'addFormFields' => $addFormFields ? $addFormFields : (object)[],
            //'updateFormFields' => $updateFormFields ? $updateFormFields : (object)[],
        ];
    }
}
