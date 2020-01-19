<?php

namespace Evaneos\Kata\Entity;

class Destination
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $countryName;

    /**
     * @var string
     */
    public $conjunction;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $computerName;

    /**
     * Destination constructor.
     * @param int    $id
     * @param string $countryName
     * @param string $conjunction
     * @param string $computerName
     * @param string $name
     */
    public function __construct($id, $countryName, $conjunction, $computerName, $name = null)
    {
        $this->id = $id;
        $this->countryName = $countryName;
        $this->conjunction = $conjunction;
        $this->computerName = $computerName;
        $this->name = $name;
    }
}
