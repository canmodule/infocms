<?php

declare(strict_types = 1);

namespace ModuleInfocms\Controllers;

class RubbingController extends AbstractController
{
    public function dealCalligrapher()
    {
        $service = $this->getServiceObj('rubbing');
        //$service->dealCalligrapher();
        //$service->dealRubbing();
        //$service->dealRubbingDetails();
        $rubbingId = $this->request->input('rubbing_id');
        //$service->checkDetail($rubbingId);
        //$service->downRubbing();
        $service->downWord();
        //$service->dealRubbingAddWords();
    }
}
