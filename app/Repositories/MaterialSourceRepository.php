<?php

declare(strict_types = 1);

namespace ModuleInfocms\Repositories;

class MaterialSourceRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'category_code', 'name', 'author', 'domain', 'url', 'description', 'attention', 'orderlist', 'status', 'material_num', 'addinfo'],
            'listSearch' => ['id', 'name', 'category_code', 'attention', 'status', 'url'],
            'add' => ['url', 'category_code', 'figure', 'book', 'author', 'attention', 'status'],
            'update' => ['category_code', 'figure', 'book', 'name', 'description', 'domain', 'author', 'attention', 'status'],
        ];
    }

    public function getShowFields()
    {
        return [
            'attention' => ['valueType' => 'key'],
            'domain' => ['valueType' => 'key'],
            'category_code' => ['showType' => 'cascader', 'valueType' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => false, 'multiple' => false], 'infos' => $this->getRepositoryObj('category')->getPointTreeDatas('category', 2, 'list')],
            'addinfo' => ['valueType' => 'callback', 'method' => 'formatAddinfoMd'],
        ];
    }

    public function formatAddinfoMd($model, $field)
    {
        $url = "http://md.canliang.wang/?app={$this->getAppCode()}&resource=material-pseudos&material_source_id={$model->id}";
        return "<a href='{$url}' target='_blank'>生成素材</a>";
    }

    public function getSearchFields()
    {
        return [
            'attention' => ['type' => 'select'],
        ];
    }

    public function getFormFields()
    {
        return [
            //'type' => ['type' => 'select'],
            'figure' => ['type' => 'selectSearch', 'require' => ['add'], 'searchResource' => 'figure', 'searchApp' => 'culture'],
            'book' => ['type' => 'selectSearch', 'require' => ['add'], 'searchResource' => 'book', 'searchApp' => 'culture'],
            'category_code' => ['type' => 'cascader', 'props' => ['value' => 'code', 'label' => 'name', 'children' => 'subInfos', 'checkStrictly' => true], 'infos' => $this->getRepositoryObj('category')->getPointTreeDatas('category', 2, 'list')],
        ];
    }

    protected function _attentionKeyDatas()
    {
        return [
            '' => '普通关注',
            'key' => '重点关注',
        ];
    }

    protected function _statusKeyDatas()
    {
        return [
            '' => '录入',
            'dealing' => '处理中',
            'finish' => '完成',
        ];
    }

    protected function _domainKeyDatas($key = null)
    {
        $datas = [
            'www.71.cn' => '宣讲家网',
            'baijiahao.baidu.com' => '百家号',
            'baike.baidu.com' => '百度百科',
        ];
        return $datas;
    }

    public function webResource()
    {
        $infos = \DB::connection('infocms')->select("SELECT * FROM `wp_network_resource`");
        $domainDatas = $this->domainDatas();
        //print_R($infos);
        foreach ($infos as $info) {
            if (empty($info->domain)) {
                $parts = parse_url($info->url);
                \DB::connection('infocms')->select("UPDATE `wp_network_resource` SET `domain` = '{$parts['host']}' WHERE `id` = {$info->id};");
                $info->domain = $parts['host'];
            }

            $domainName = $domainDatas[$info->domain] ?? $info->domain;
            echo "{$info->id}-<a href='{$info->url}' target='_blank'>{$info->name}</a> = {$domainName} == {$info->author}<br />";
        }
        exit();
    }

    public function _getFieldOptions()
    {
        return [
            'category_code' => ['width' => 180],
            'description' => ['width'  => 100],
            'material_num' => ['name' => '素材数'],
        ];
    }
}
