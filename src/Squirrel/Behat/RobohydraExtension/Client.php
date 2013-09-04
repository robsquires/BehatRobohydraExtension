<?php

namespace Squirrel\Behat\RobohydraExtension;

use Buzz\Browser;
use Buzz\Exception\ClientException;

class Client
{
    /**
     * $browser
     * @var Buzz\Browser
     */
    private $browser;


    private $host;

    public function __construct(Browser $browser, $host)
    {
        $this->browser = $browser;  
        $this->host = $host;
    }



    public function isRunning()
    {
        try{
            $response = $this
                ->browser
                ->get(
                    sprintf(
                        "%s%s",
                        $this->host,
                        '/'
                    )
                )
            ;
        }
        catch(ClientException $e) {
            return false;
        }
        return true;
    }
}
