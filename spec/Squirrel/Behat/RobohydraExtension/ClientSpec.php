<?php

namespace spec\Squirrel\Behat\RobohydraExtension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{

    private $host = "localhost";

    /**
     * @param Buzz\Browser $buzz
     */
    function let($buzz)
    {
        $this->beConstructedWith($buzz, $this->host);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Squirrel\Behat\RobohydraExtension\Client');
    }

    function it_should_state_that_robohydra_is_running_when_it_responds($buzz, $response)
    {
        $buzz
            ->get(
                sprintf(
                    "%s%s",
                    $this->host,
                    '/'
                )
            )
            ->shouldBeCalled()
            ->willReturn($response)
        ;


        $this
            ->isRunning()
            ->shouldReturn(true)
        ;
    }
}
