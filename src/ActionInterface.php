<?php declare(strict_types=1);


namespace MF;


interface ActionInterface
{
    public function setApp(Application $application);
    public function run(Request $request): Response;
}