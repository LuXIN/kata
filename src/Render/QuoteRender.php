<?php

namespace Evaneos\Kata\Render;

use Evaneos\Kata\Entity\Quote;

class QuoteRender
{
    /**
     * @param Quote $quote
     * @return string
     */
    public static function renderHtml(Quote $quote)
    {
        return '<p>' . $quote->getId() . '</p>';
    }

    /**
     * @param Quote $quote
     * @return string
     */
    public static function renderText(Quote $quote)
    {
        return (string)$quote->getId();
    }
}