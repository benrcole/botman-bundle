<?php


namespace Sgomez\Bundle\BotmanBundle\Services\Http;


use BotMan\BotMan\Messages\Attachments\Contact;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Http\Client\Common\HttpMethodsClient;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Psr\Log\LoggerInterface;
use Sgomez\Bundle\BotmanBundle\Exception\RCSClientException;
use Sgomez\Bundle\BotmanBundle\Model\RCS\CalendarAction;
use Sgomez\Bundle\BotmanBundle\Model\RCS\DialerAction;
use Sgomez\Bundle\BotmanBundle\Model\RCS\IsTyping;
use Sgomez\Bundle\BotmanBundle\Model\RCS\MapAction;
use Sgomez\Bundle\BotmanBundle\Model\RCS\MessageContact;
use Sgomez\Bundle\BotmanBundle\Model\RCS\RCSContentMessage;
use Sgomez\Bundle\BotmanBundle\Model\RCS\RCSContentMessageWithSuggestedChipList;
use Sgomez\Bundle\BotmanBundle\Model\RCS\RCSMessage;
use Sgomez\Bundle\BotmanBundle\Model\RCS\RCSMessageWithContactInfo;
use Sgomez\Bundle\BotmanBundle\Model\RCS\Reply;
use Sgomez\Bundle\BotmanBundle\Model\RCS\TextMessage;
use Sgomez\Bundle\BotmanBundle\Model\RCS\URLAction;
use Sgomez\Bundle\BotmanBundle\Model\RCS\UserContact;
use Sgomez\Bundle\BotmanBundle\Model\Telegram\User;
use Sgomez\Bundle\BotmanBundle\Serializer\RCSHandler;
use Symfony\Component\HttpFoundation\Response;

class RCSClient
{
    /**
     * @var HttpMethodsClient
     */
    private $client;
    /**
     * @var string
     */
    private $botId;
    private $maapAddress;
    private $token;
    private $logger;
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(HttpMethodsClient $client, LoggerInterface $logger, string $bot_id, string $maapUrl, string $token)
    {
        AnnotationRegistry::registerLoader('class_exists');

        $this->client = $client;
        $this->botId = $bot_id;
        $this->maapAddress = $maapUrl;
        $this->token = $token;
        $this->logger=$logger;
        $this->serializer = SerializerBuilder::create()->configureHandlers(function(HandlerRegistry $registry) {
            $registry->registerSubscribingHandler(new RCSHandler());
        })->addDefaultHandlers()->build();


    }

    public function sendIsTyping($contact){
        $base = new RCSMessageWithContactInfo();
        $message = new RCSContentMessage();
        $message->setIsTyping('active');
        $base->setRcsMessage($message);
        $base->setMessageContact(new UserContact($contact));
        //prd($this->serializer->serialize($base,'json'));
        $this->sendPayload('messages',$this->serializer->serialize($base,'json'));
    }


    public function sendTextMessage($content, $contact){

        $message = new RCSMessageWithContactInfo();
        $rcsMessage = new RCSContentMessage();
        $rcsMessage->setTextMessage($content);
        $message->setRcsMessage($rcsMessage);
        $message->setMessageContact(new UserContact($contact));
       return $this->sendPayload($this->buildUrl("messages"),$this->serializer->serialize($message,'json'));
    }
    

    private function sendPayload(string $endpoint, ?string $body = null): RCSMessage
    {
        $response = $this->client->post(
            $this->buildUrl("messages"),
            ['Content-Type'=>'application/json',
                'Authorization'=>sprintf('Bearer %s',$this->token)],
            $body
        );
        $this->logger->debug("Request Content: ". $body);
        $this->logger->debug("res sent: ".$body);
        $responseData = $response->getBody()->getContents();
        $this->logger->debug("Response Content: ". $responseData);
        $this->logger->debug("Response Status: ". $response->getStatusCode());

        /*if (Response::HTTP_BAD_REQUEST !== $response->getStatusCode()) {
            throw RCSClientException::fromPayload($endpoint, $responseData);
        }*/
        return $this->serializer->deserialize($responseData,RCSMessage::class,'json');
    }

    private function buildUrl(string $endpoint): string
    {
        return sprintf("https://%s/bot/v1/%s@%s/%s/", $this->maapAddress, $this->botId, $this->maapAddress, $endpoint);
    }
}