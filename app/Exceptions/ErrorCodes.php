<?php
	
	namespace App\Exceptions;
	
	class ErrorCodes
	{
		
		const UNAUTHORIZED = 'UNAUTHORIZED';
		const TOKEN_MISSING = 'TOKEN_MISSING';
		const TOKEN_EXPIRED = 'TOKEN_EXPIRED';
		const TOKEN_INVALID = 'TOKEN_INVALID';
		const WRONG_PASSWORD = 'WRONG_PASSWORD';
		const PHONE_EXISTS = "PHONE_EXISTS";
		const USER_NOT_FOUND = "USER_NOT_FOUND";
		const VALIDATION_ERROR = 'VALIDATION_ERROR';
		const NEW_TRIP_ERROR = 'NEW_TRIP_ERROR';
		const CURSOR_ERROR = 'CURSOR_ERROR';
		const SMS_VERIFICATION = 'SMS_VERIFICATION';
		const PHONE_NOT_FOUND = 'PHONE_NOT_FOUND';
		const WRONG_VERIFICATION_CODE = 'WRONG_VERIFICATION_CODE';
		
	}
