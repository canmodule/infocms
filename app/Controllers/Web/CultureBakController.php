<?php

namespace ModuleInfocms\Controllers\Web;

class CultureBakController extends Controller
{
    public function home()
    {
        return $this->customView('home');
    }

    public function listinfo($code = '', $page = 1)
    {
        $category = empty($code) ? ['parent_code' => '', 'name' => '书法欣赏', 'code' => null] : $this->getModelObj('cultureCategory')->where(['code' => $code])->first();
        $repository = $this->getRepositoryObj('cultureArticle');
        $lists = $repository->paginate(null, ['*']);
        //print_R($info);
        $datas = [
            'view' => 'list',
            'title' => '列表',
            'description' => '描述',
            'keyword' => 'tag',
            'lists' => $lists,
            'currentCategory' => $category,
        ];
        return $this->customView('list', $datas);
    }

    public function show($id)
    {
        return $this->_showCommon($id, 'show', 'cultureArticle', 'infocms');
    }

	public function test()
	{
		$str = '';
		$domains = [
			'culture' => 'http://culture.91zuiai.com', 
			'pet' => 'http://pet.91zuiai.com', 
            'subject' => 'http://subject-test.91zuiai.com',
            'brand' => 'http://brand-test.91zuiai.com',
			'guide' => 'http://guide.91zuiai.com',
            'human' => 'http://human-test.91zuiai.com',
		];

		$routes = [
			'culture' => ['/', '/listinfo', '/show-1'],
			'pet' => ['/', '/info-show-1', '/info-list', '/info-home', '/pet-home', '/pet-list', '/pet-show-1', '/special-list', '/special-show-1'],
			'subject' => ['/', '/human', '/info', '/knowledge', '/league', '/product', '/shop', '/store'],
			'brand' => ['/', '/detail', '/product', '/shop', '/store'],
			'guide' => ['/', '/show-human-1', '/show-info-1', '/show-knowledge-1', '/show-league-1', '/show-shop-1', '/show-store-1', '/vote'],
			'human' => ['/', '/404', '/about', '/blog', '/contact', '/elements', '/gallery', '/home_alternative', '/page_alternative', '/portfolio', '/portfolio_item', '/portfolio_item_2', '/register', '/services', '/single_post', '/resume'],
		];

		foreach (['culture', 'pet', 'subject', 'brand', 'guide', 'human'] as $elem) {
			$domain = $domains[$elem];
			foreach ($routes[$elem] as $route) {
				$url = $domain . $route;
				$str .= "<a href='{$url}' target='_blank'>{$url}</a><br />";
			}
		}
        //echo "<img src='http://api.91zuiai.com/captcha' />";
		echo $str;
	}

	protected function viewPath()
	{
		return 'culture';
	}
}
