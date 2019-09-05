<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

/**
 * Class DialerAction
 * @JMS\AccessorOrder("custom", custom = {"showLocation","displayText"})
 * @package Sgomez\Bundle\BotmanBundle\Model\RCS
 */
class CalendarAction extends Action
{
    /**
     * @var string
     * @JMS\SerializedName("calendarAction");
     */
    private $calendarAction;


    public function __construct($displayText, $postData=null)
    {
        $this->displayText=$displayText;

        if($postData)
            $this->postback=['data'=>$postData];

    }

    public function createEvent(\DateTime $start, \DateTime $stop,string $title, string $description){
        $this->calendarAction=[
            'createCalendarEvent'=>[
                'startTime'=>$start->format('c'),
                'endTime'=>$start->format('c'),
                'title'=>$title,
                'description'=>$description
            ]
        ];
    }
}

/*
 },
 }, {
 "$ref": "#/definitions/suggestions/actions/composeAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/deviceAction"
 }, {
 "$ref": "#/definitions/suggestions/actions/settingsAction"
 */