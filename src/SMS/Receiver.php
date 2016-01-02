<?php


namespace Joomtriggers\Ideamart\SMS;

use Joomtriggers\Ideamart\Contracts\ReceiverInterface;

class Receiver implements ReceiverInterface{
    public function receive($request,Handler $handler){}

}