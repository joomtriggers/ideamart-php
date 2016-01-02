<?php

/**
 * Class: HandlerTest
 *
 * PHP Version 5.6
 *
 * @category Testing
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 *
 * @see TestCase
 */

namespace Joomtriggers\Ideamart\Tests;



use Joomtriggers\Ideamart\Handler;

/**
 * Class: HandlerTest
 *
 * @category Testing
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 *
 * @see TestCase
 */
class HandlerTest extends TestCase
{

    public function testSample(){

        $handler = new Handler();
        var_dump($handler->sms()
            ->setApplication("APP_007460")
            ->setSecret("JUGGLISH")
            ->setMessage("Message")
            ->addSubscriber('tel:9900000')
            ->send())
        ;
        $request = '"message":"my testing message",
            "address":"tel:94777323654", "requestId":"APP_000001",
            "encoding":"0", "version":"1.0"';
        var_dump($handler->sms()->receiver(json_decode($request))->getMessage());
    }

}
