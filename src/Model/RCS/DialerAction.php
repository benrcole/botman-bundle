<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

/**
 * Class DialerAction
 * @JMS\AccessorOrder("custom", custom = {"dialerAction","displayText"})
 * @package Sgomez\Bundle\BotmanBundle\Model\RCS
 */
class DialerAction extends Action
{
    /**
     * @var string
     * @JMS\SerializedName("dialerAction");
     */
    private $phoneNumber;

    public function __construct($phoneNumber, $displayText, $postData=null)
    {
        $this->phoneNumber=["dialPhoneNumber"=>['phoneNumber'=>$phoneNumber]];
        $this->displayText=$displayText;
        if ($postData) {
            $this->postback=['data'=>$postData];
        }
    }
}
