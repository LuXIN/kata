<?php

namespace Evaneos\Kata\Entity;

class Site
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $url;

    /**
     * Site constructor.
     * @param int    $id
     * @param string $url
     */
    public function __construct($id, $url)
    {
        $this->id = $id;
        $this->url = $url;
    }
}
