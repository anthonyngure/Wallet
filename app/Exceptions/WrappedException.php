<?php
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 23/12/2016
	 * Time: 10:24
	 */
	
	namespace App\Exceptions;
	
	
	class WrappedException extends \Exception
	{
		
		/**
		 * @var string
		 */
		private $errorMessage;
		/**
		 * @var string
		 */
		private $errorCode;
		
		private $errorData;
		
		function __construct(string $message = 'An error occurred', string $code = 'UNKNOWN', $data = null)
		{
			
			$this->errorMessage = $message;
			$this->errorCode = $code;
			$this->errorData = $data;
		}
		
		/**
		 * @return string
		 */
		public function getErrorMessage(): string
		{
			return $this->errorMessage;
		}
		
		/**
		 * @return string
		 */
		public function getErrorCode(): string
		{
			return $this->errorCode;
		}
		
		public function getErrorData()
		{
			return $this->errorData;
		}
		
		
	}