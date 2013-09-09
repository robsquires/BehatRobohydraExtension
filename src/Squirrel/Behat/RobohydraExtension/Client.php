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


    private function doGet($path)
    {
        try{
            $response = $this
                ->browser
                ->get(
                    sprintf(
                        "%s%s",
                        $this->host,
                        $path
                    )
                )
            ;
        }
        catch(ClientException $e) {
            return null;
        }
        return $response;
    }

    public function isRunning()
    {
        return $this->doGet('/robohydra-admin') == null ? false : true;
    }


    public function get($path)
    {
        return $this->doGet($path);
    }
}
