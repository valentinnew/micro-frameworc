<?php declare(strict_types=1);


namespace MF\Action;

use MF\ActionInterface;
use MF\Application;
use MF\Response;

abstract class BaseAction implements ActionInterface
{
    protected Application $application;
    public function setApp(Application $application)
    {
        $this->application = $application;
    }

    public function getApp(): Application
    {
        return $this->application;
    }

    public function render(string $template, array $params = [])
    {
        return $this->getApp()
            ->getLayout()
            ->render(
                $this->getApp()->getPath($template),
                $params
            );
    }

    public function renderTemplate(string $template, array $params = [])
    {
        return $this->getApp()
            ->getLayout()
            ->renderTemplate(
                $this->getApp()->getPath($template),
                $params
            );
    }

    public function renderJson($data)
    {
        $response = new Response();
        $response->setHeader('Content-Type', 'application/json');
        $response->setBody(json_encode($data));
        return $response;
    }
}