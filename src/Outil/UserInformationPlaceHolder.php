<?php

namespace Evaneos\Kata\Outil;

use Evaneos\Kata\Context\ApplicationContext;
use Evaneos\Kata\Entity\User;

class UserInformationPlaceHolder implements IReplace
{
    const PLACEHOLDER_USER_FIRST_NAME = '[user:first_name]';

    /**
     * @var User
     */
    private $user;

    /**
     * UserInformationPlaceHolder constructor.
     * @param User $user
     */
    public function __construct(User $user = null)
    {
        if (!$user) {
            $applicationContext = ApplicationContext::getInstance();
            $user = $applicationContext->getCurrentUser();
        }
        $this->user = $user;
    }

    /**
     * @param $text
     * @return string|string[]
     */
    public function replace($text)
    {
        // nothing to replace
        if (false === strpos($text, static::PLACEHOLDER_USER_FIRST_NAME)) {
            return $text;
        }

        return str_replace(static::PLACEHOLDER_USER_FIRST_NAME,
            ucfirst($this->user->firstName), $text);
    }
}