<?php

namespace spec\Squirrel\Behat\RobohydraExtension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Squirrel\Behat\RobohydraExtension\Extension');
    }

    function it_should_be_a_behat_extension()
    {
        $this->shouldBeAnInstanceOf('Behat\Behat\Extension\ExtensionInterface');
    }
}
