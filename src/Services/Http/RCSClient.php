<?php


namespace Sgomez\Bundle\BotmanBundle\Services\Http;


use Http\Client\Common\HttpMethodsClient;
use Sgomez\Bundle\BotmanBundle\Exception\RCSClientException;
use Sgomez\Bundle\BotmanBundle\Model\Telegram\User;

class RCSClient
{

    //DUNXX1566588043@
    //"Authorization" : "Bearer 5nwSir3k49bJeZvgTQ6tRA"

//DUNXX1566588043@botplatform.lab.mavenir.com
    //private const BASE_URI = 'https://botplatform.o2.co.uk/bot/v1/%s@botplatform.o2.co.uk/%s';
    private const BASE_URI = 'https://maap.rcs.mavenir.com/bot/v1/%s@maap.rcs.mavenir.com/%s';

    /**
     * @var HttpMethodsClient
     */
    private $client;
    /**
     * @var string
     */
    private $token;

    public function __construct(HttpMethodsClient $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    public function getMe()
    {

//        $payload='{"RCSMessage": {"richcardMessage":{"message": {"generalPurposeCard": {"content": {"description": "A gift for every occasion, impress your loved ones with something unique.",							"suggestions": [{"reply": {"postback": {"data": "CMDShowCatalogue"}, "displayText": "Catalogue"}}, 							{"reply": {"postback": {"data": "CMDShowCart"}, "displayText": "Cart"}},							{"reply": {"postback": {"data": "CMDWelcomeMoreInfo"}, "displayText": "More Information"}}], 							"media": {"mediaUrl": "https://botplatform.o2.co.uk/demo/img/flowerShop/00_Instant_Flora_Logo.jpg", 							"mediaFileSize": 42458, "mediaContentType": "image/jpg", "height": "MEDIUM_HEIGHT"}}, "layout": {"imageAlignment": "TOP", 							"cardOrientation": "VERTICAL"}}}}},							"messageContact": {"userContact": "+447860763727" }}';
        $data=http_build_query([
            'scope'=>'botmessage',
            'grant_type'=>'client_credentials',
            'client_id'=>'ben.cole@telefonica.com',
            'client_secret'=>'EiM4I9'
        ]);

        $response = $this->client->post(
            'https://maap.rcs.mavenir.com/token',
            ['Content-Type'=>'application/x-www-form-urlencoded;'],
            $data
        );
        var_dump($response->getReasonPhrase());
prd($response->getStatusCode());
        $responseData = \json_decode($response->getBody()->getContents(), true);

        prd($responseData);

    }

    public function getWebhookInfo(): array
    {
        return $this->sendPayload('getWebhookInfo');
    }

    public function setWebhook(string $url): array
    {
        $body = \json_encode(['url' => $url]) ?: null;

        return $this->sendPayload('setWebhook', $body);
    }

    public function removeWebhook(): array
    {
        return $this->sendPayload('deleteWebhook');
    }

    private function sendPayload(string $endpoint, ?string $body = null): array
    {
        $response = $this->client->post($this->buildUrl($endpoint), ['Content-Type'=>'application/json; charset=utf-8','Authorization'=>'Bearer 5nwSir3k49bJeZvgTQ6tRA'], $body);
prd($response);
        $responseData = \json_decode($response->getBody()->getContents(), true);
        prd($responseData);

        if (200 !== $response->getStatusCode()) {
            throw RCSClientException::fromPayload($endpoint, $responseData);
        }

        return $responseData;
    }

    private function buildUrl(string $endpoint): string
    {
        return sprintf(self::BASE_URI, $this->token, $endpoint);
    }
}