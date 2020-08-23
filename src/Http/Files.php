<?php declare(strict_types=1);


namespace MF\Http;


class Files
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}