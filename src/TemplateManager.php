<?php

namespace Evaneos\Kata;

use Evaneos\Kata\Entity\Quote;
use Evaneos\Kata\Entity\Template;
use Evaneos\Kata\Outil\UserInformationPlaceHolder;
use Evaneos\Kata\Render\QuoteRender;
use Evaneos\Kata\Repository\DestinationRepository;
use Evaneos\Kata\Repository\SiteRepository;

class TemplateManager
{
    const PLACEHOLDER_QUOTE_LINK = '[quote:destination_link]';
    const PLACEHOLDER_QUOTE_DESTINATION_NAME = '[quote:destination_name]';
    const PLACEHOLDER_QUOTE_SUMMARY_HTML = '[quote:summary_html]';
    const PLACEHOLDER_QUOTE_SUMMARY = '[quote:summary]';

    /**
     * @param Template $template
     * @param array    $data
     * @return Template
     */
    public function getTemplateComputed(Template $template, array $data)
    {
        $template->setSubject($this->computeText($template->getSubject(), $data));
        $template->setContent($this->computeText($template->getContent(), $data));
        return $template;
    }

    /**
     * @param string $text
     * @param array  $data
     * @return string|string[]
     */
    private function computeText($text, array $data)
    {
        $text = $this->replaceQuoteInformation($text, isset($data['quote']) ? $data['quote'] : null);

        $userPlaceholder = new UserInformationPlaceHolder(isset($data['user']) ? $data['user'] : null);
        $text = $userPlaceholder->replace($text);

        return $text;
    }

    /**
     * @param string $text
     * @param Quote  $quote
     * @return string|string[]
     */
    private function replaceQuoteInformation($text, Quote $quote)
    {
        $text = $this->replaceQuoteSummaryHtml($text, $quote);
        $text = $this->replaceQuoteSummary($text, $quote);
        $text = $this->replaceQuoteDestinationName($text, $quote);
        $text = $this->replaceQuoteDestinationLink($text, $quote);
        return $text;
    }

    /**
     * @param string $text
     * @param Quote  $quote
     * @return string|string[]
     */
    private function replaceQuoteSummaryHtml($text, Quote $quote)
    {
        if (false === strpos($text, static::PLACEHOLDER_QUOTE_SUMMARY_HTML)) {
            return $text;
        }

        return str_replace(
            static::PLACEHOLDER_QUOTE_SUMMARY_HTML,
            QuoteRender::renderHtml($quote),
            $text
        );
    }

    /**
     * @param string $text
     * @param Quote  $quote
     * @return string|string[]
     */
    private function replaceQuoteDestinationName($text, Quote $quote)
    {
        if (false === strpos($text, static::PLACEHOLDER_QUOTE_DESTINATION_NAME)) {
            return $text;
        }

        $destinationOfQuote = DestinationRepository::getInstance()->getById($quote->getDestinationId());

        return str_replace(static::PLACEHOLDER_QUOTE_DESTINATION_NAME,
            $destinationOfQuote->countryName, $text);
    }

    /**
     * @param string $text
     * @param Quote  $quote
     * @return string|string[]
     */
    private function replaceQuoteDestinationLink($text, Quote $quote)
    {
        $destination = DestinationRepository::getInstance()->getById($quote->getDestinationId());

        if (isset($destination)) {
            $site = SiteRepository::getInstance()->getById($quote->getSiteId());
            return str_replace(static::PLACEHOLDER_QUOTE_LINK,
                $site->url . '/' . $destination->countryName . '/quote/' . $quote->getId(), $text);
        }
        return str_replace(static::PLACEHOLDER_QUOTE_LINK, '', $text);
    }

    /**
     * @param string $text
     * @param Quote  $quote
     * @return string|string[]
     */
    private function replaceQuoteSummary($text, Quote $quote)
    {
        if (false === strpos($text, static::PLACEHOLDER_QUOTE_SUMMARY_HTML)) {
            return $text;
        }

        return str_replace(
            static::PLACEHOLDER_QUOTE_SUMMARY,
            QuoteRender::renderText($quote),
            $text
        );
    }
}
