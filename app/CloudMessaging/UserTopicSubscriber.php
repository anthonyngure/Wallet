<?php
/**
 * Created by PhpStorm.
 * User: Tosh
 * Date: 11/01/2017
 * Time: 22:32
 */

namespace App\CloudMessaging;


use App\Constants;
use sngrl\PhpFirebaseCloudMessaging\Client;

class UserTopicSubscriber
{

    /**
     * UserTopicSubscriber constructor.
     */
    public function __construct()
    {
    }

    public function subscribe($topicId, Array $userDeviceTokens)
    {

        $client = new Client();
        $client->setApiKey(Constants::FIREBASE_SERVER_KEY);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $response = $client->addTopicSubscription($topicId, $userDeviceTokens);
        var_dump($response->getStatusCode());
        var_dump($response->getBody()->getContents());
    }

    public function unSubscribe($topicId, Array $userDeviceTokens)
    {
        $client = new Client();
        $client->setApiKey(Constants::FIREBASE_SERVER_KEY);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $response = $client->removeTopicSubscription($topicId, $userDeviceTokens);
        var_dump($response->getStatusCode());
        var_dump($response->getBody()->getContents());
    }
}