<?php declare(strict_types=1);


namespace MF\Http;


class Session
{
    private array $data = [];
    private array $config;
    private bool $inits = false;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }


    public function __get(string $key)
    {
        if (!$this->inits) {
            session_start($this->config);
            $this->data = $_SESSION ?? [];
            session_write_close();
            $this->inits = true;
        }

        return $this->data[$key] ?? null;
    }

    public function __set($key, $value)
    {
        session_start($this->config);
        $_SESSION[$key] = $value;
        $this->data = $_SESSION;
        session_write_close();

        return $this;
    }
}