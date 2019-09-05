<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

class MessageContact
{
    /**
     * @return mixed
     * @JMS\SerializedName("userContact")
     * @JMS\Type("string")
     */
    protected $identifier;

    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }
}