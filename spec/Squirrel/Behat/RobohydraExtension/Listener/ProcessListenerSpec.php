<?php

namespace spec\Squirrel\Behat\RobohydraExtension\Listener;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProcessListenerSpec extends ObjectBehavior
{
    
    /**
     * @param Squirrel\Behat\RobohydraExtension\Process\Manager $manager
     */
    function let($manager)
    {
        $this->beConstructedWith($manager);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Squirrel\Behat\RobohydraExtension\Listener\ProcessListener');
    }

    function it_should_be_an_event_subscriber()
    {
        $this->shouldBeAnInstanceOf('Symfony\Component\EventDispatcher\EventSubscriberInterface');
    }


    function it_should_subscribe_to_events()
    {
        $this
            ->getSubscribedEvents()
            ->shouldReturn(
                array(
                    'beforeSuite' => array('startRoboHydra', -100),
                    'afterSuite'  => array('stopRoboHydra', 100)
                )
            )
        ;
    }

    function it_should_start_robohydra($manager)
    {   
        $manager
            ->start()
            ->shouldBeCalled()
        ;
        
        $this->startRoboHydra();
    }

    function it_should_stop_the_process($manager)
    {
         $manager
            ->stop()
            ->shouldBeCalled()
        ;
        
        $this->stopRoboHydra();
    }
}
