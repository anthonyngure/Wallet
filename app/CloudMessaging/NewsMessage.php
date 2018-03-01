<?php
/**
 * Created by PhpStorm.
 * User: Tosh
 * Date: 11/01/2017
 * Time: 22:22
 */

namespace App\CloudMessaging;

use App\Constants;
use App\News;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Topic;
use sngrl\PhpFirebaseCloudMessaging\Notification;


class NewsMessage
{
    private $newsMessage;
    private $title;

    /**
     * TopicMessage constructor.
     * @param $newsMessage
     * @param $title
     */
    public function __construct($newsMessage, $title)
    {
        $this->newsMessage = substr($newsMessage, 0, 320);
        $this->title = $title;
    }

    public function push()
    {

        $news = News::updateOrCreate([
            'message' => $this->newsMessage,
            'title' => $this->title
        ]);

        $client = new Client();
        $client->setApiKey(Constants::FIREBASE_SERVER_KEY);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $notification = new Notification();
        $notification->setClickAction(ClickActions::ACTION_NEWS);
        $notification->setTitle('VibeCampo');
        $notification->setBody($this->title);
        $notification->setTag(rand(100000, 1000000));

        $data = array(
            'newsId' => $news->newsId,
            'title'=> $this->title,
            'message' => $this->newsMessage,
            'createdAt' => $news->createdAt->toDateTimeString(),
        );

        $message = new Message();
        $message->setPriority('high');
        $message->addRecipient(new Topic(Topics::VIBECAMPO_NEWS));
        $message->setNotification($notification)
            ->setData($data)
        ;

        $client->send($message);

        //$response = $client->send($message);
        //var_dump($response->getStatusCode());
        //var_dump($response->getBody()->getContents());
        //echo json_encode($message);
    }
}