<?php

use Evaneos\Kata\Entity\Quote;
use Evaneos\Kata\Entity\Template;
use Evaneos\Kata\TemplateManager;

require_once __DIR__ . '/../vendor/autoload.php';

$faker = \Faker\Factory::create();

$template = new Template(
    1,
    'Votre voyage avec une agence locale [quote:destination_name]',
    "
Bonjour [user:first_name],

Merci d'avoir contacté un agent local pour votre voyage [quote:destination_name].

Bien cordialement,

L'équipe Evaneos.com
www.evaneos.com
");
$templateManager = new TemplateManager();

$message = $templateManager->getTemplateComputed(
    $template,
    [
        'quote' => new Quote($faker->randomNumber(), $faker->randomNumber(), $faker->randomNumber(), $faker->date())
    ]
);

echo $message->getSubject() . "\n" . $message->getContent();
