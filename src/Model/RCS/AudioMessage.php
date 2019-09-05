<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;


class AudioMessage extends RCSContentMessage
{
    /**
     * @var
     */
    private $fileSize;
    /**
     * @var
     */
    private $fileUrl;
    private $fileMIMEType;
    private $playingLength;

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param mixed $fileSize
     */
    public function setFileSize($fileSize): void
    {
        $this->fileSize = $fileSize;
    }

    /**
     * @return mixed
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }

    /**
     * @param mixed $fileUrl
     */
    public function setFileUrl($fileUrl): void
    {
        $this->fileUrl = $fileUrl;
    }

    /**
     * @return mixed
     */
    public function getFileMIMEType()
    {
        return $this->fileMIMEType;
    }

    /**
     * @param mixed $fileMIMEType
     */
    public function setFileMIMEType($fileMIMEType): void
    {
        $this->fileMIMEType = $fileMIMEType;
    }

    /**
     * @return mixed
     */
    public function getPlayingLength()
    {
        return $this->playingLength;
    }

    /**
     * @param mixed $playingLength
     */
    public function setPlayingLength($playingLength): void
    {
        $this->playingLength = $playingLength;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName): void
    {
        $this->fileName = $fileName;
    }
    private $fileName;

}