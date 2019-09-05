<?php


namespace Sgomez\Bundle\BotmanBundle\Model\RCS;

use JMS\Serializer\Annotation as JMS;
use Sgomez\Bundle\BotmanBundle\Exception\RCSClientException;

/**
 * @JMS\ExclusionPolicy("none")
 * @JMS\AccessorOrder("custom", custom = {"textMessage", "suggestedChipList"})
 */
class RCSContentMessageWithSuggestedChipList extends RCSMessage
{

    /**
     * @var
     */
    private $suggestedChipList = [];

    /**
     * @var
     * @JMS\VirtualProperty()
     * @JMS\SerializedName("suggestedChipList")
     * @return array
     */
    public function getSuggestions(){
            return ['suggestions'=>$this->getSuggestedChipList()];
    }

    /**
     * @return mixed
     */
    public function getSuggestedChipList()
    {
        return $this->suggestedChipList;
    }

    /**
     * @param mixed $suggestedChipList
     */
    public function setSuggestedChipList($suggestedChipList): void
    {
        $this->suggestedChipList = $suggestedChipList;
    }

    public function addReplySuggestion(Reply $action){
        $this->suggestedChipList[]=['reply'=>$action];
    }

    public function addActionSuggestion(Action $action){
        $this->suggestedChipList[]=['action'=>$action];

    }
}