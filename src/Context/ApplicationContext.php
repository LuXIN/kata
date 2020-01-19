<?php

namespace Evaneos\Kata\Context;

use Evaneos\Kata\Entity\Site;
use Evaneos\Kata\Entity\User;
use Evaneos\Kata\Helper\SingletonTrait;

class ApplicationContext
{
    use SingletonTrait;

    /**
     * @var Site
     */
    private $currentSite;

    /**
     * @var User
     */
    private $currentUser;

    /**
     * ApplicationContext constructor.
     */
    protected function __construct()
    {
        $faker = \Faker\Factory::create();
        $this->currentSite = new Site($faker->randomNumber(), $faker->url);
        $this->currentUser = new User($faker->randomNumber(), $faker->firstName, $faker->lastName, $faker->email);
    }

    /**
     * @return Site
     */
    public function getCurrentSite()
    {
        return $this->currentSite;
    }

    /**
     * @return User
     */
    public function getCurrentUser()
    {
        return $this->currentUser;
    }
}
