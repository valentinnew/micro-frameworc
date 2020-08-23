<?php declare(strict_types=1);


namespace MF\Http;


class Get
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}