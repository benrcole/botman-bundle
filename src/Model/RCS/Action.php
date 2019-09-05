<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

class Action
{
    /**
     * @var array
     * @JMS\SkipWhenEmpty()
     */
    protected $postback;


    /**
     * @var string
     * @JMS\SerializedName("displayText");
     */
    protected $displayText;
}
