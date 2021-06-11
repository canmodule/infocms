<?php

declare(strict_types = 1);

namespace ModuleInfocms\Controllers;

class IndexController extends AbstractController
{
    public function index()
    {
        $method = $this->request->getMethod();
        $user = $this->request->input('user', 'Wang');
        return [
            'method' => $method,
	        'message' => "Hello {$user}.",
        ];
    }
}
