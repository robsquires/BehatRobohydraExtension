<?php

namespace Squirrel\Behat\RobohydraExtension\Context\Initializer;

use Behat\Behat\Context\ContextInterface;
use Behat\Behat\Context\Initializer\InitializerInterface;
use Squirrel\Behat\RobohydraExtension\Context\RobohydraAwareInterface;
use Squirrel\Behat\RobohydraExtension\Client;


class RobohydraAwareInitializer implements InitializerInterface
{
    /**
     * @var Client $client
     */
    private $client = null;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param ContextInterface $context
     *
     * @return boolean
     */
    public function supports(ContextInterface $context)
    {
        return $context instanceof RobohydraAwareInterface;
    }

    /**
     * @param ContextInterface $context
     */
    public function initialize(ContextInterface $context)
    {
        $context->setRobohydra($this->client);
    }
}