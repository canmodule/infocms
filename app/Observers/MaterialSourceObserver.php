<?php

declare(strict_types = 1);

namespace ModuleInfocms\Observers;

use Symfony\Component\DomCrawler\Crawler;
use ModuleInfocms\Models\MaterialSource;

class MaterialSourceObserver
{
    public function saving(MaterialSource $model)
    {
        if (empty($model->name) || empty($model->description)) {
            $pageInfo = $this->getPageInfo($model);
            $model->name = empty($model->name) ? $pageInfo['name'] : $model->name;
            $model->description = empty($model->description) ? $pageInfo['description'] : $model->description;
        }
        if (empty($model->domain)) {
            $parts = parse_url($model->url);
            $model->domain = $parts['host'];
        }
        return true;
    }

    public function getPageInfo($model)
    {
        $result = $model->getServiceObj('passport-guzzle')->fetchRemoteData(['pointUrl' => $model->url]);
        //$content = file_get_contents(urldecode($fUrl));
        $crawler = new Crawler();
        $crawler->addContent($result['bodyStr']);
        $title = $crawler->filter('title')->text();
        $description = '';
        $crawler->filter('meta')->each(function ($node) use (& $description) {
            $attr = $node->attr('name');
            if ($attr == 'description') {
                $description = $node->attr('content');
            }
		});
        return ['name' => trim(strval($title)), 'description' => trim(strval($description))];
    }
}
