<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;


use JMS\Serializer\Annotation as JMS;

class FileMessage
{
    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $thumbnailFileName;

    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    public $thumbnailUrl;


    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $thumbnailMIMEType;
    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $thumbnailFileSize;
    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $fileName;
    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $fileUrl;
    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $fileMIMEType;
    /**
     * @var string
     * @JMS\Type("string")
     * max 200
     */
    private $fileSize;
}