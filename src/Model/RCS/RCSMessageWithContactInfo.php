<?php

namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;
use Sgomez\Bundle\BotmanBundle\Model\RCS\RCSMessage;

/**
 * @JMS\ExclusionPolicy("none")
 */
class RCSMessageWithContactInfo
{
    /**
     * @var RCSMessage
     * @JMS\Type("Sgomez\Bundle\BotmanBundle\Model\RCS\RCSContentMessage")
     * @JMS\SerializedName("RCSMessage")
     */
    private $rcsMessage;

    /**
     * @var MessageContact
     * @JMS\Type("Sgomez\Bundle\BotmanBundle\Model\RCS\MessageContact")
     * @JMS\SerializedName("messageContact")
     */
    private $messageContact;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("event")
     */
    private $event;


    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("callbackURL")
     */
    private $callbackURL;


    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("callbackUrlValidity")
     */
    private $callbackUrlValidity;

    /**
     * @return MessageContact
     * @JMS\Expose("messageContact")
     */
    public function getMessageContact(): MessageContact
    {
        return $this->messageContact;
    }

    /**
     * @return RCSMessage
     * @JMS\Expose()
     */
    public function getRcsMessage(): RCSMessage
    {
        return $this->rcsMessage;
    }

    /**
     * @param RCSMessage $rcsMessage
     */
    public function setRcsMessage(RCSMessage $rcsMessage): void
    {
        $this->rcsMessage = $rcsMessage;
    }

    /**
     * @param MessageContact $messageContact
     */
    public function setMessageContact(MessageContact $messageContact): void
    {
        $this->messageContact = $messageContact;
    }

}