<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessorOrder("custom", custom = {"msgId","isTyping", "timestamp"})
 */
abstract class RCSMessage
{
    /**
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("timestamp")
     */
    protected $timestamp;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("msgId")
     */
    protected $msgId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    protected $status;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("isTyping")
     */
    protected $isTyping;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SkipWhenEmpty()
     * @JMS\SerializedName("textMessage")
     */
    protected $textMessage;


    /**
     * @var string
     * @JMS\Type("Sgomez\Bundle\BotmanBundle\Model\RCS\FileMessage")
     * @JMS\SkipWhenEmpty()
     * @JMS\SerializedName("fileMessage")
     */
    protected $fileMessage;


    /**
     * @var string
     * @JMS\Type("Sgomez\Bundle\BotmanBundle\Model\RCS\GeolocationPushMessage")
     * @JMS\SkipWhenEmpty()
     * @JMS\SerializedName("geolocationPushMessage")
     */
    protected $geolocationPushMessage;


    /**
     * @return string
     */
    public function getTextMessage(): string
    {
        return $this->textMessage;
    }

    /**
     * @param string $textMessage
     */
    public function setTextMessage(string $textMessage): void
    {
        $this->textMessage = $textMessage;
    }

    /**
     * @param string $isTyping
     */
    public function setIsTyping(string $isTyping): void
    {
        $this->isTyping = $isTyping;
    }
}