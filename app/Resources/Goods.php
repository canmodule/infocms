<?php

namespace ModuleInfocms\Resources;

class Goods extends AbstractResource
{

    protected function _fullArray()
    {
        $skuInfos = $this->resource->skuInfos;
        $skuValues = $this->_formatSkuValues($skuInfos);
        return [
            //'goods' => $this->getRepository()->getFormatShowFields('view', $this->resource, $this->getSimpleResult()),
            'skuElems' => $this->resource->categoryCode->type->getSkuElems($skuValues),
            'attributeElems' => $this->resource->categoryCode->type->getAttributeElems($this->resource->attributeInfos),
            'skuInfos' => $this->resource->skuInfos,
            //'attributes' => $this->resource->attributeInfos,
        ];
    }

    protected function _formatSkuValues($skuInfos)
    {
        $datas = [];
        $skuFields = $this->getRepository()->resource->getObject('repository', 'attribute')->getKeyValues('sku_field');
        foreach ($skuInfos as $skuInfo) {
            foreach ($skuFields as $skuField) {
                $datas[$skuField][] = $skuInfo[$skuField];
            }
        }
        foreach ($skuFields as $field){
            $datas[$field] = isset($datas[$field]) ? array_filter(array_unique($datas[$field])) : [];
        }
        return $datas;
    }

    /*protected function _skuInfos()
    {
        $this->resource->skuDatas:
        $scene = 'goods';
        $repository = $this->getRepository()->resource->getObject('repository', 'goodsSku');
        $repository = $repository->getDealSearchFields($scene, ['goods_id' => $this->resource->id]);
        $list = $repository->all();

        $collectionClass = $repository->getCollectionClass();
        $collection = new $collectionClass($list, $scene, $repository);
        return $collection->toResponse();
    }

    protected function _attributeInfos()
    {
        $scene = 'goods';
        $repository = $this->getRepository()->resource->getObject('repository', 'goodsAttribute');
        $repository = $repository->getDealSearchFields($scene, ['goods_id' => $this->resource->id]);
        $list = $repository->all();

        $collectionClass = $repository->getCollectionClass();
        $collection = new $collectionClass($list, $scene, $repository);
        return $collection->toResponse();
    }*/
}
