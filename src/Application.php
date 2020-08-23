<?php declare(strict_types=1);


namespace MF;


class Application
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->initEnv();
    }

    private function initEnv()
    {
        $env = $this->config['env'];

        ini_set('display_errors', ($env->APP_PHP_INI_DISPLAY_ERRORS ? 'on' : 'off'));
    }

    public function getPath($path): string
    {
        return str_replace(array_keys($this->config['pathAlias']), $this->config['pathAlias'], $path);
    }

    public function getLayout(): View
    {
        return $this->config['layout'];
    }

    public function run(Request $request): string
    {
        return (new Router($this->config))
            ->getAction($this, $request->getUri())
            ->run($request)
            ->print();
    }
}