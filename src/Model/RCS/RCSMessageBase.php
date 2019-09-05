<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;


class RCSMessageBase  extends RCSMessage
{
    private $msgId;
    /**
     * @var MessageStatus
     */
    private $status;

    /**
     * @var String
     */
    private $trafficType;
    //[ advertisement,
    //payment, premium,
    //subscription ]

    /**
     * @var \DateTime
     */
    private $expiry;

    /**
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @return \DateTime
     */
    public function getExpiry(): \DateTime
    {
        return $this->expiry;
    }

    /**
     * @return mixed
     */
    public function getMsgId()
    {
        return $this->msgId;
    }
}