<?php
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 30/01/2017
	 * Time: 23:37
	 */
	
	namespace App\Traits;
	
	
	use App\Sms\SmsSender;
	
	trait SendsVerificationCode
	{
		
		/**
		 * @param int $phone
		 * @param int $verificationCode
		 * @return bool
		 */
		protected function sendVerificationCodeSMS($phone, $verificationCode)
		{
			$message = 'Enter PickPack code ' . $verificationCode . ' to continue. #PickPack';
			
			$smsSender = new SmsSender('+' . $phone);
			
			if ($smsSender->send($message)) {
				$smsSent = true;
			} else {
				$smsSent = false;
			}
			
			return $smsSent;
		}
		
	}