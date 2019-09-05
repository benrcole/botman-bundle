<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

/**
 * Class DialerAction
 * @JMS\AccessorOrder("custom", custom = {"openUrl","displayText"})
 * @package Sgomez\Bundle\BotmanBundle\Model\RCS
 */
class URLAction extends Action
{
    /**
     * @var string
     * @JMS\SerializedName("urlAction");
     */
    private $openUrl;

    private $fallbackUrl;

    public function __construct($url, $displayText, $fallbackUrl, $postData=null)
    {
        $this->openUrl=["openUrl"=>["url"=>$url]];
        $this->displayText=$displayText;
        $this->fallbackUrl=$fallbackUrl;
        if($postData)
            $this->postback=['data'=>$postData];
    }
}

/*
 * "$ref": "#/definitions/suggestions/actions/urlAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/dialerAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/mapAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/calendarAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/composeAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/deviceAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/settingsAction"
 */