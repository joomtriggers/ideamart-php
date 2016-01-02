<?php


namespace Joomtriggers\Ideamart\SMS;

use Joomtriggers\Ideamart\Contracts\ReceiverInterface;

class Receiver implements ReceiverInterface
{
    protected $sender = "";
    protected $encoding = 0;
    protected $app_id="";
    /**
     * Receives the request
     *
     * @param mixed   $request Array
     * @param Handler $handler Handler
     *
     * @return $handler
     */
    public function receive($request,Handler $handler)
    {

        $this->sender = $request['SourceAddress'];
        $this->app_id = $request['requestId'];
        $this->encoding = $request['encoding'];

        return $handler;
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function getSender()
    {
        return $this->sender;
    }
    /**
     * undocumented function
     *
     * @return void
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    public function getApplication(){
        return $this->app_id;
    }



}
