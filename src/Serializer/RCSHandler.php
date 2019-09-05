<?php


namespace Sgomez\Bundle\BotmanBundle\Serializer;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Context;
use Sgomez\Bundle\BotmanBundle\Model\RCS\MessageContact;
use Sgomez\Bundle\BotmanBundle\Model\RCS\RCSContentMessage;
use Sgomez\Bundle\BotmanBundle\Model\RCS\TextMessage;
use Sgomez\Bundle\BotmanBundle\Model\RCS\UserContact;

class RCSHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => MessageContact::class,
                'method' => 'deserializeMessageContactFromJson',
            ],
        ];
    }

    public function deserializeMessageContactFromJson(JsonDeserializationVisitor $visitor, $contactAsArray, array $type, Context $context)
    {
        if (array_key_exists('userContact', $contactAsArray)) {
            return new UserContact($contactAsArray['userContact']);
        } elseif (array_key_exists('botContact', $contactAsArray)) {
            return new UserContact($contactAsArray['botContact']);
        } else {
            throw new \Exception("Dont know how to deserialize this");
        }
    }

    public function deserializeMessageContentFromJson(JsonDeserializationVisitor $visitor, $contentAsArray, array $type, Context $context)
    {
        if (array_key_exists('textMessage', $contentAsArray)) {
            $visitor->getCurrentObject()->setTextMessage($contentAsArray['textMessage']);
        } elseif (array_key_exists('botContact', $contentAsArray)) {
            return new UserContact($contentAsArray['botContact']);
        } else {
            throw new \Exception("Dont know how to deserialize this");
        }
    }
}
