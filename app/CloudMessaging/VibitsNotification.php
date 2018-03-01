<?php
	
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 08/01/2017
	 * Time: 16:57
	 */
	
	namespace App\CloudMessaging;
	
	use App\AwardCategoryCodes;
	use App\Constants;
	use App\User;
	use JWTAuth;
	use sngrl\PhpFirebaseCloudMessaging\Client;
	use sngrl\PhpFirebaseCloudMessaging\Message;
	use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
	use sngrl\PhpFirebaseCloudMessaging\Notification;
	
	class VibitsNotification
	{
		
		private $awardedVibits;
		private $awardedCategory;
		private $awardedUserDeviceToken;
		
		/**
		 * CommentNotification constructor
		 * @param        $awardedVibits
		 * @param        $awardedUserDeviceToken
		 * @param        $awardedCategory
		 */
		public function __construct($awardedVibits, $awardedUserDeviceToken, $awardedCategory)
		{
			$this->awardedVibits = $awardedVibits;
			$this->awardedCategory = $awardedCategory;
			$this->awardedUserDeviceToken = $awardedUserDeviceToken;
		}
		
		public function push()
		{
			$client = new Client();
			$client->setApiKey(Constants::FIREBASE_SERVER_KEY);
			$client->injectGuzzleHttpClient(new \GuzzleHttp\Client());
			
			$notification = new Notification();
			$notification->setClickAction(ClickActions::ACTION_NEW_VIBITS);
			$notification->setTitle('VibeCampo - Vibits Award');
			$notification->setBody($this->awardedVibits . ' vibits for ' . $this->getAwardCategoryReason($this->awardedCategory) . '.');
			$notification->setTag(rand(100000, 1000000));
			
			$data = array('vibitsCount' => JWTAuth::user()->vibits(), 'awardCategory' => $this->awardedCategory);
			
			$message = new Message();
			$message->setPriority('high')
				->addRecipient(new Device($this->awardedUserDeviceToken))
				->setNotification($notification)
				->setData($data);
			
			$client->send($message);
			
			//var_dump($response->getStatusCode());
			//var_dump($response->getBody()->getContents());
			//echo json_encode($awardedVibits);
		}
		
		private function getAwardCategoryReason($awardedCategory)
		{
			switch ($awardedCategory) {
				case AwardCategoryCodes::REGISTRATION:
					return "joining VibeCampo";
				case AwardCategoryCodes::AVATAR:
					return 'changing profile photo';
				case AwardCategoryCodes::VIBE:
					return 'posting a vibe';
				case AwardCategoryCodes::LIKE:
					return 'liking a vibe';
				case AwardCategoryCodes::COMMENT:
					return 'commenting on a vibe';
				default:
					return '';
			}
		}
		
	}
