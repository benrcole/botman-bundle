<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

class Reply
{
    /**
     * @var string
     * @JMS\SerializedName("displayText");
     */
    private $displayText; //e.164 format

    /**
     * @var array
     * @JMS\SkipWhenEmpty()
     */
    private $postback;

    public function __construct($text,$postback=null)
    {
        $this->displayText=$text;
        if($postback)
            $this->postback=['data'=>$postback];
    }


}