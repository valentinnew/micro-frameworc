<?php declare(strict_types=1);


namespace MF;


class Request
{
    private string $uri;
    private Http\Post $post;
    private Http\Request $request;
    private Http\Session $session;
    private Http\Get $get;
    private Http\Cookie $cookie;
    private Http\Files $files;

    public function __construct($data)
    {
        $this->uri     = $data['uri'];
        $this->cookie  = $data['cookie'];
        $this->session = $data['session'];
        $this->request = $data['request'];
        $this->get     = $data['get'];
        $this->post    = $data['post'];
        $this->files   = $data['files'];
    }

    public function getPost(): Http\Post
    {
        return $this->post;
    }

    public function getRequest(): Http\Request
    {
        return $this->request;
    }

    public function getSession(): Http\Session
    {
        return $this->session;
    }

    public function getGet(): Http\Get
    {
        return $this->get;
    }

    public function getCookie(): Http\Cookie
    {
        return $this->cookie;
    }

    public function getFiles(): Http\Files
    {
        return $this->files;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}