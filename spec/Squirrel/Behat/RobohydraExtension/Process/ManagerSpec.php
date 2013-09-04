<?php

namespace spec\Squirrel\Behat\RobohydraExtension\Process;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ManagerSpec extends ObjectBehavior
{
    /**
     * @param Symfony\Component\Process\Process $process
     */
    function let($process)
    {
        $this->beConstructedWith($process);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Squirrel\Behat\RobohydraExtension\Process\Manager');
    }

    function it_should_asynchronously_start_the_process($process)
    {   
        $process
            ->start()
            ->shouldBeCalled()
        ;
        
        $this->start();
    }

    function it_should_stop_the_process($process)
    {
         $process
            ->stop()
            ->shouldBeCalled()
        ;
        
        $this->stop();
    }
}
