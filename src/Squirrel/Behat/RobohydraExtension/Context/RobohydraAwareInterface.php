<?php

namespace Squirrel\Behat\RobohydraExtension\Context;

use Squirrel\Behat\RobohydraExtension\Client;

interface RobohydraAwareInterface
{
    /**
     * @param Client $robohydra
     */
    public function setRobohydra(Client $robohydra);
}