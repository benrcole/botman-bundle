<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

/**
 * Class DialerAction
 * @JMS\AccessorOrder("custom", custom = {"showLocation","displayText"})
 * @package Sgomez\Bundle\BotmanBundle\Model\RCS
 */
class MapAction extends Action
{
    /**
     * @var string
     * @JMS\SerializedName("mapAction");
     */
    private $mapAction;

    /**
     * @var string
     * @JMS\SerializedName("fallbackUrl");
     */
    private $fallbackUrl;

    public function __construct($displayText, $fallbackUrl, $postData=null)
    {
        $this->displayText=$displayText;
        $this->fallbackUrl=$fallbackUrl;
        if ($postData) {
            $this->postback=['data'=>$postData];
        }
    }

    public function setQuery($query)
    {
        $this->mapAction=[
            'showLocation'=>[
                'location'=>[
                    'query'=>$query
                ]
            ]
        ];
    }

    public function setLocation($lat, $long, $label)
    {
        $this->mapAction=[
            'showLocation'=>[
                'location'=>[
                    'latitude'=>$lat,
                    'longitude'=>$long,
                    'label'=>$label
                ]
            ]
        ];
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
