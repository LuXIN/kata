<?php

namespace Evaneos\Kata\Repository;

use Evaneos\Kata\Entity\Destination;
use Evaneos\Kata\Helper\SingletonTrait;
use Faker\Factory;

class DestinationRepository implements Repository
{
    use SingletonTrait;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $conjunction;

    /**
     * @var string
     */
    private $computerName;

    /**
     * DestinationRepository constructor.
     */
    public function __construct()
    {
        $this->country = Factory::create()->country;
        $this->conjunction = 'en';
        $this->computerName = Factory::create()->slug();
    }

    /**
     * @param int $id
     * @return Destination
     */
    public function getById($id)
    {
        // DO NOT MODIFY THIS METHOD
        return new Destination(
            $id,
            $this->country,
            $this->conjunction,
            $this->computerName
        );
    }
}
