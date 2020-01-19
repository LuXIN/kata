<?php

namespace Evaneos\Kata\Entity;

class Quote
{
    /**
     * @var int
     */
    private $id;

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
    private $dateQuoted;

    /**
     * Quote constructor.
     * @param int       $id
     * @param int       $siteId
     * @param int       $destinationId
     * @param \DateTime $dateQuoted
     */
    public function __construct($id, $siteId, $destinationId, $dateQuoted)
    {
        $this->id = $id;
        $this->siteId = $siteId;
        $this->destinationId = $destinationId;
        $this->dateQuoted = $dateQuoted;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param int $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return int
     */
    public function getDestinationId()
    {
        return $this->destinationId;
    }

    /**
     * @param int $destinationId
     */
    public function setDestinationId($destinationId)
    {
        $this->destinationId = $destinationId;
    }

    /**
     * @return \DateTime
     */
    public function getDateQuoted()
    {
        return $this->dateQuoted;
    }

    /**
     * @param \DateTime $dateQuoted
     */
    public function setDateQuoted($dateQuoted)
    {
        $this->dateQuoted = $dateQuoted;
    }

    /**
     * @param Quote $quote
     * @return string
     */
    public static function renderHtml(Quote $quote)
    {
        return '<p>' . $quote->id . '</p>';
    }

    /**
     * @param Quote $quote
     * @return string
     */
    public static function renderText(Quote $quote)
    {
        return (string)$quote->id;
    }
}