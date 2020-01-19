<?php

namespace Evaneos\Kata\Entity;

class Template
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $content;

    /**
     * Template constructor.
     * @param $id
     * @param $subject
     * @param $content
     */
    public function __construct($id, $subject, $content)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->content = $content;
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
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}