<?php declare(strict_types=1);


namespace MF;


class Environment
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = array_merge([
            'APP_PHP_INI_DISPLAY_ERRORS' => 0,
        ], $config);
    }

    public function __get($key)
    {
        return $this->config[$key] ?? null;
    }
}