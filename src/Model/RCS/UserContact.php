<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;

class UserContact extends MessageContact
{
    /**
     * @return mixed
     * @JMS\SerializedName("userContact")
     * @JMS\Type("string")
     */
    protected $identifier;
}
