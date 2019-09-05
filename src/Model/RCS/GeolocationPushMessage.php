<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;


use JMS\Serializer\Annotation as JMS;

class GeolocationPushMessage
{

    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $label;
    /**
     * @JMS\Type("DateTime")
     * @var \DateTime
     */
    private $timestamp;
    /**
     * @JMS\Type("DateTime")
     * @var \DateTime
     */
    private $expiry;

    /**
     * @var
     * @JMS\Type("integer")
     * @JMS\SerializedName("timeOffset")
     */
    private $timeOffset;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $pos;


    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $radius;





}