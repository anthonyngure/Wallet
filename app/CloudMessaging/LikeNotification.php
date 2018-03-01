<?php

/**
 * Created by PhpStorm.
 * User: Tosh
 * Date: 08/01/2017
 * Time: 16:57
 */

namespace App\CloudMessaging;

use App\Constants;
use App\FeedLike;
use App\User;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;

class LikeNotification
{

    private $feedLike;
    private $feedUserDeviceToken;

    
    public function __construct(FeedLike $feedLike, string $feedUserDeviceToken)
    {
        $this->feedUserDeviceToken = $feedUserDeviceToken;
        $this->feedLike = $feedLike;
    }

    public function push()
    {
        $client = new Client();
        $client->setApiKey(Constants::FIREBASE_SERVER_KEY);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $notification = new Notification();
        $notification->setClickAction(ClickActions::ACTION_NEW_LIKE);
        $notification->setTitle('New Like - '.$this->feedLike->user->name);
        $notification->setBody($this->feedLike->user->name.' liked your vibe.');
        $notification->setTag($this->feedLike->feed->getKey());

        $data = array(
            'feedId' => $this->feedLike->feed->getKey(),
            'commentsCount' => $this->feedLike->feed->comments_count,
            'likesCount' => $this->feedLike->feed->likes_count,
        );

        $message = new Message();
        $message->setPriority('high')
            ->addRecipient(new Device($this->feedUserDeviceToken))
            ->setNotification($notification)
            ->setData($data);

        $client->send($message);

        //$response = $client->send($message);
        //var_dump($response->getStatusCode());
        //var_dump($response->getBody()->getContents());
        //echo json_encode($message);
    }

}
