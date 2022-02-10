<?php

namespace ModuleInfocms\Controllers\Web;

class GraphicController extends Controller
{
    public function home()
    {
        $this->getHuman();
        return $this->customView('home');
    }

	public function isMobile($force = false)
	{
        if (empty($force)) {
		    return null;
        }
        return parent::isMobile($force);
	}

	protected function viewPath()
	{
		return 'graphic';
	}
}
