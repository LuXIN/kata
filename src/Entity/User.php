<?php

namespace Evaneos\Kata\Entity;

class User
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $email;

    /**
     * User constructor.
     * @param int    $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct($id, $firstName, $lastName, $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }
}
