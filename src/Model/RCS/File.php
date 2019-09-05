<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;


class File
{
    /**
     * @var
     */
    private $fileId;

/**
 * @param mixed $fileId
 */
public function setFileId($fileId): void
{
    $this->fileId = $fileId;
}

/**
 * @var integer
 */
private $fileSize;

/**
 * @var string
 * [ pending, ready,
expired, invalid ]
 */
private $status;


private $validity;
}