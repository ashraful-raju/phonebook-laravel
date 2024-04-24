<?php

namespace App\Services;

class ContactService
{
    public $name;

    protected $email;

    private $gender = "Male";

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->name = "Raju";
        $this->email = "ashraful4dev@gmail.com";
    }
}
