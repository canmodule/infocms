<?php

namespace ModuleInfocms\Controllers\Web;

class HumanController extends Controller
{
    public function home()
    {
        $this->getHuman();
        return $this->customView('home');
    }

    public function view()
    {
        $code = $this->getRouteParam('code');
        return $this->customView($code);
    }

    public function detail()
    {
        return $this->customView('show');
    }

    public function resume()
    {
        return $this->customView('resume');
    }

	public function isMobile()
	{
		return null;
	}

	protected function viewPath()
	{
		return 'human';
	}

    public function getHuman()
    {
        $human = $this->getRouteParam('human');
        return $human;
    }
}
