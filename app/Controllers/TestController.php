<?php

declare(strict_types = 1);

namespace ModuleInfocms\Controllers;

class TestController extends AbstractController
{
    public function tmp()
    {
        $text = file('/data/log/dealdata/tmp/admin.json');
        $data = json_decode($text[0], true);
        echo $text[0];exit();
        $request = $this->request;
        $inTest = config('app.inTest');
        if (empty($inTest)) {
            return $this->error(400, '非法请求');
        }
        $method = ucfirst($request->input('method', ''));
        $method = "_test{$method}";
        $this->$method($request);
    }

    public function category()
    {
        return $this->testTmp('category');
    }

    public function comment()
    {
        return $this->testTmp('comment');
    }

    public function disqus()
    {
        return $this->testTmp('disqus');
    }

    public function tag()
    {
        return $this->testTmp('tag');
    }

    public function article()
    {
        $text = file('/data/log/dealdata/tmp/article.json');
        $model = $this->getModelObj('culture-cultureArticle');
        $info = $model->find(2);
        $data = json_decode($text[0], true);
        $data['result']['title'] = $info['title'];
        //$data['result']['content'] = file_get_contents('/tmp/content.txt');//$info['content'];
        $data['result']['content'] = $info['content'];
        echo json_encode($data);exit();

        //print_r($data);exit();
    }

    public function announce()
    {
        return $this->testTmp('announce');
    }

    public function articleList()
    {
        return $this->testTmp('articleList');
    }

    public function admin()
    {
        return $this->testTmp('admin');
    }

    protected function testTmp($code)
    {
        $text = file('/data/log/dealdata/tmp/' . $code . '.json');
        $data = json_decode($text[0], true);
        echo $text[0];exit();
    }

    public function _test()
    {
        //exit();
    }
}
