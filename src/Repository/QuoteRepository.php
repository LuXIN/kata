<?php

namespace Evaneos\Kata\Repository;

use Evaneos\Kata\Entity\Quote;
use Evaneos\Kata\Helper\SingletonTrait;

class QuoteRepository implements Repository
{
    use SingletonTrait;

    /**
     * @var int
     */
    private $siteId;

    /**
     * @var int
     */
    private $destinationId;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * QuoteRepository constructor.
     */
    public function __construct()
    {
        // DO NOT MODIFY THIS METHOD
        $generator = \Faker\Factory::create();

        $this->siteId = $generator->numberBetween(1, 10);
        $this->destinationId = $generator->numberBetween(1, 200);
        $this->date = new \DateTime();
    }

    /**
     * @param int $id
     * @return Quote
     */
    public function getById($id)
    {
        // DO NOT MODIFY THIS METHOD
        return new Quote(
            $id,
            $this->siteId,
            $this->destinationId,
            $this->date
        );
    }
}
