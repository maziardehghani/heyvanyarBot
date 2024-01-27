<?php

require_once 'Trait/Methods.php';
class Validation
{
    use Methods;
    private string $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function check_valid($callable): static
    {
        return new self($this->$callable($this->request));
    }

    public function tap()
    {
        return $this->request;
    }
}