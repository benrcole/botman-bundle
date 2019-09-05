<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

class RCSMessageType extends RCSMessage
{
    private $suggestedResponse;
    private $sharedData;
    private $isTyping;
    /**
     * @var RCSContentMessageWithSuggestedChipList
     */
    private $ref;
}
