<?php

/**
 * Created by PhpStorm.
 * User: Tosh
 * Date: 08/01/2017
 * Time: 16:57
 */

namespace App\CloudMessaging;

use App\Constants;
use App\Feed;
use App\User;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;

class CommentNotification
{

    private $commentingUser;
	/**
	 * @var \App\Feed
	 */
    private $commentedFeed;
    private $commentText;
    private $feedUserDeviceToken;

    /**
     * CommentNotification constructor
     * @param $commentedFeed
     * @param $commentText
     * @param $feedUserDeviceToken
     * @param User $commentingUser
     */
    public function __construct(Feed $commentedFeed, $commentText, $feedUserDeviceToken, User $commentingUser)
    {
        $this->commentedFeed = $commentedFeed;
        $this->commentText = $commentText;
        $this->commentingUser = $commentingUser;
        $this->feedUserDeviceToken = $feedUserDeviceToken;
    }

    public function push()
    {
        $client = new Client();
        $client->setApiKey(Constants::FIREBASE_SERVER_KEY);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $notification = new Notification();
        $notification->setClickAction(ClickActions::ACTION_NEW_COMMENT);
        $notification->setTitle('New Comment - '.$this->commentingUser->name);
        $notification->setBody($this->commentingUser->name.' commented on your vibe.');
        $notification->setTag($this->commentingUser->getKey());

        $data = array(
            'feedId' => $this->commentedFeed->getKey(),
            'commentsCount' => $this->commentedFeed->comments_count,
            'likesCount' => $this->commentedFeed->likes_count,
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
