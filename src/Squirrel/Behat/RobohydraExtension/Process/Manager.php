<?php

namespace Squirrel\Behat\RobohydraExtension\Process;

use Symfony\Component\Process\Process;

class Manager
{

    /**
     * $process description
     * @var Symfony\Component\Process\Process
     */
    private $process;

    private $client;


    public function __construct($process, $client)
    {
        $this->process = $process;

        $this->client = $client;
    }


    

    public function start()
    {
        $this->process->start();

        $timeout = 5;
        $sleep = 1;
        $inc = 0;
        while(! $this->client->isRunning() && $inc <= $timeout){
           sleep(1);
           $inc += $sleep;
        }

        if(! $this->client->isRunning()) {
            throw new \Exception('Robohydra could not be reached');
        }
    }

    public function stop()
    {
        //not actually sure if this is needed
        $this->process->stop();
    }
}
