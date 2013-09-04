<?php

namespace Squirrel\Behat\RobohydraExtension\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProcessListener implements EventSubscriberInterface
{
    
    /**
     * $manager
     * @var Not sure yet
     */
    private $manager;

    public function __construct($manager)
    {
        $this->manager = $manager;
    }
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'beforeSuite' => array('startRoboHydra', -100),
            'afterSuite'  => array('stopRoboHydra', 100)
        );
    }

    public function startRoboHydra()
    {
        $this->manager->start();
    }

    public function stopRoboHydra()
    {
        $this->manager->stop();
    }

}
