<?php
	
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 08/01/2017
	 * Time: 16:57
	 */
	
	namespace App\CloudMessaging;
	
	use App\Constants;
	use App\Friendship;
	use App\Http\Transformers\AppendedUserTransformer;
	use App\User;
	use App\UserDevice;
	use Fractal;
	use JWTAuth;
	use sngrl\PhpFirebaseCloudMessaging\Client;
	use sngrl\PhpFirebaseCloudMessaging\Message;
	use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
	use sngrl\PhpFirebaseCloudMessaging\Notification;
	
	class SyncFriendshipNotification
	{
		
		/**
		 * @var User
		 */
		private $userToSync;
		
		
		/**
		 * @var string
		 */
		private $clickAction;
		
		/**
		 * @var string
		 */
		private $notificationTitle;
		
		/**
		 * @var string
		 */
		private $notificationBody;
		
		/**
		 * @var Friendship
		 */
		private $newFriendship;
		
		/**
		 * @var bool
		 */
		private $noNotification;
		
		/**
		 * SyncFriendshipNotification constructor.
		 */
		public function __construct()
		{
		}
		
		/**
		 * @param User $userToSync
		 * @return SyncFriendshipNotification
		 */
		public function setUserToSync(User $userToSync): SyncFriendshipNotification
		{
			$this->userToSync = $userToSync;
			
			return $this;
		}
		
		
		/**
		 * @param string $clickAction
		 * @return SyncFriendshipNotification
		 */
		public function setClickAction(string $clickAction): SyncFriendshipNotification
		{
			$this->clickAction = $clickAction;
			
			return $this;
		}
		
		/**
		 * @param string $notificationTitle
		 * @return SyncFriendshipNotification
		 */
		public function setNotificationTitle(string $notificationTitle): SyncFriendshipNotification
		{
			$this->notificationTitle = $notificationTitle;
			
			return $this;
		}
		
		/**
		 * @param string $notificationBody
		 * @return SyncFriendshipNotification
		 */
		public function setNotificationBody(string $notificationBody): SyncFriendshipNotification
		{
			$this->notificationBody = $notificationBody;
			
			return $this;
		}
		
		/**
		 * @param Friendship $newFriendship
		 * @return SyncFriendshipNotification
		 */
		public function setNewFriendship(Friendship $newFriendship): SyncFriendshipNotification
		{
			$this->newFriendship = $newFriendship;
			
			return $this;
		}
		
		/**
		 * @param bool $noNotification
		 * @return SyncFriendshipNotification
		 */
		public function setNoNotification(bool $noNotification): SyncFriendshipNotification
		{
			$this->noNotification = $noNotification;
			
			return $this;
		}
		
		
		/**
		 * Does the actual sending of the notification
		 */
		public function push()
		{
			$client = new Client();
			$client->setApiKey(Constants::FIREBASE_SERVER_KEY);
			$client->injectGuzzleHttpClient(new \GuzzleHttp\Client());
			
			$notification = new Notification();
			
			if (!$this->noNotification) {
				$notification->setClickAction($this->clickAction);
				$notification->setTitle($this->notificationTitle);
				$notification->setBody($this->notificationBody);
				$notification->setSound('default');
				$notification->setTag(JWTAuth::user()->getKey());
			}
			
			$data = Fractal::item(JWTAuth::user(), new AppendedUserTransformer())->toArray();
			$data['data']['friendship'] = $this->newFriendship->toArray();
			
			if ($this->noNotification) {
				$meta = array('action' => (string)$this->clickAction);
			}
			
			$meta['friendsCount'] = (int)JWTAuth::user()->friendsCount();
			
			$finalData = array_merge($meta, $data);
			
			$message = new Message();
			$message->setPriority('high')
				->setData($finalData);
			
			if (!$this->noNotification) {
				$message->setNotification($notification);
			}
			
			
			$userToSyncDevice = UserDevice::whereUserId($this->userToSync->getKey())->first();
			if (!empty($userToSyncDevice) && !empty($userToSyncDevice->token)) {
				
				$message->addRecipient(new Device($userToSyncDevice->token));
				
				$client->send($message);
				
				//$response = $client->send($message);
				//echo '<br/><br/>' . $response->getStatusCode();
				//echo '<br/><br/>' . $response->getBody()->getContents().'<br/><br/>';
				//echo json_encode($message);
			}
		}
		
		
	}
