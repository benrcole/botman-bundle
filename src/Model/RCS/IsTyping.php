<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

class IsTyping extends RCSMessage
{
    public function __construct($status)
    {
        $this->status=$status;
    }

    private $status;
}
