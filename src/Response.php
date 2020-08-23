<?php declare(strict_types=1);


namespace MF;


class Response
{
    private string $body = '';

    public function print(): string
    {
        return $this->getBody();
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setHeader(string $key, string $value)
    {
        header($key . ': ' . $value);
    }

    public function setCookie( string $name, string $value = "", int $expires = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = false): bool
    {
        return setcookie ($name, $value, $expires, $path, $domain, $secure, $httponly);
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }
}