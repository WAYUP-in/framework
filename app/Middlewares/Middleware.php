<?php

namespace App\Middlewares;

abstract class Middleware
{
    private array $params;
    private array $data;

    public function __construct(array $params = [], array $data = [])
    {
        $this->params = $params;
        $this->data = $data;
    }

    abstract public function handle();

    protected function requestData(): array
    {
        return $this->data;
    }

    protected function requestParams(): array
    {
        return $this->params;
    }
}