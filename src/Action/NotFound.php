<?php declare(strict_types=1);


namespace MF\Action;

use MF\Response;
use MF\Request;

class NotFound extends BaseAction
{
    public function run(Request $request): Response
    {
        $response = new Response();
        $response->setBody('Not found');
        return $response;
    }
}