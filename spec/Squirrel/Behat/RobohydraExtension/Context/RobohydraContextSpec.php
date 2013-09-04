<?php

namespace spec\Squirrel\Behat\RobohydraExtension\Context;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RobohydraContextSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Squirrel\Behat\RobohydraExtension\Context\RobohydraContext');
    }
}
