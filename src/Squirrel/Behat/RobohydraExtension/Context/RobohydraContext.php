<?php

namespace Squirrel\Behat\RobohydraExtension\Context;

use Behat\Behat\Context\BehatContext;
use Squirrel\Behat\RobohydraExtension\Client;

class RobohydraContext extends BehatContext implements RobohydraAwareInterface
{

    protected $robohydra;

    /**
     * @param Client $robohydra
     */
    public function setRobohydra(Client $robohydra)
    {
        $this->robohydra = $robohydra;
    }


}