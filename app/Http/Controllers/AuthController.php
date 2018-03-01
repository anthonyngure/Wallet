<?php
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 17/01/2017
	 * Time: 20:10
	 */
	
	namespace App\Http\Controllers;
	
	
	use App\Exceptions\ErrorCodes;
	use App\Exceptions\WrappedException;
	use App\Traits\SendsVerificationCode;
	use App\Traits\UserTrait;
	use App\User;
	use App\Utils;
	use Auth;
	use Hash;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Illuminate\Database\Eloquent\Relations\HasMany;
	use Illuminate\Database\Eloquent\Relations\HasOne;
	use Illuminate\Http\Request;
	use JWTAuth;
	
	class AuthController extends Controller
	{
		use SendsVerificationCode, UserTrait;
		
		/**
		 * @param            $userId
		 * @param array|null $meta
		 * @return \Illuminate\Http\Response
		 */
		private function authenticateUser($userId, array $meta = null)
		{
			
			$user = User::with(['matatuOfficial' => function (HasOne $hasOne) {
				$hasOne->with(['matatu' => function (BelongsTo $belongsTo) {
					$belongsTo->with(['sacco' => function (BelongsTo $belongsTo) {
						$belongsTo->with(['officials' => function (HasMany $hasMany) {
							$hasMany->with('user');
						}, 'route'                    => function (BelongsTo $belongsTo) {
							$belongsTo->with('stages');
						}]);
					}]);
				}]);
			}, 'saccoOfficial'                   => function (HasOne $hasOne) {
			}])->findOrFail($userId);
			
			$token = JWTAuth::fromUser($user);
			
			$user->token = $token;
			
			return $this->itemResponse($user, null, $meta == null ? array() : $meta)
				->header('Authorization', $token);
		}
		
		/**
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 * @throws \App\Exceptions\WrappedException
		 */
		public function phoneSignIn(Request $request)
		{
			$this->validate($request, [
				'signInId' => 'required',
				'password' => 'required',
			]);
			
			$user = User::where('phone', Utils::normalizePhone($request->signInId))
				->orWhere('email', $request->signInId)->first();
			
			if ($user == null) {
				$errorMessage = $request->signInId . ' is not a registered email address or phone number. '
					. 'Please use your correct Sign In details or create an account.';
				throw new WrappedException($errorMessage, ErrorCodes::USER_NOT_FOUND);
			}
			
			
			//Send a code to verify the phone
			if (!str_contains($user->email, 'test')) {
				$verificationCode = random_int(1000, 9999);
			} else {
				$verificationCode = 9999;
			}
			
			$user->phone_verified = false;
			$user->phone_verification_code = $verificationCode;
			$user->save();
			
			if (!str_contains($user->email, 'test')) {
				$this->sendVerificationCodeSMS($user->phone, $verificationCode);
			}
			
			$data = [
				'phone'    => $user->phone,
				'signInId' => $request->signInId,
			];
			
			return $this->arrayResponse($data, null, ['message' => 'Pending phone number verification.']);
		}
		
		/**
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 * @throws \App\Exceptions\WrappedException
		 */
		public function webSignIn(Request $request)
		{
			sleep(1);
			$this->validate($request, [
				'email'    => 'required|email',
				'password' => 'required',
			]);
			
			$user = User::whereEmail($request->email)->first();
			
			if ($user == null) {
				$errorMessage = $request->username . ' is not a registered username. '
					. 'Please use your correct Sign In details.';
				throw new WrappedException($errorMessage, ErrorCodes::USER_NOT_FOUND);
			}
			
			if (!Hash::check($request->password, $user->password)) {
				throw new WrappedException("Wrong password.", ErrorCodes::WRONG_PASSWORD);
			}
			
			
			return $this->authenticateUser($user->getKey(), ['message' => 'Signed In successfully.']);
		}
		
		/**
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 * @throws \App\Exceptions\WrappedException
		 */
		public function verification(Request $request)
		{
			$this->validate($request, [
				'signInId' => 'required',
				'code'     => 'required|digits:4',
			]);
			
			$user = User::where('phone', Utils::normalizePhone($request->signInId))
				->orWhere('email', $request->signInId)->first();
			
			if ($user == null) {
				$errorMessage = $request->signInId . ' is not a registered email address or phone number. '
					. 'Please use your correct Sign In details or create an account.';
				throw new WrappedException($errorMessage, ErrorCodes::USER_NOT_FOUND);
			}
			
			
			if ($user->phone_verification_code != $request->code) {
				$message = 'The verification code entered was wrong!';
				throw new WrappedException($message, ErrorCodes::WRONG_VERIFICATION_CODE);
			}
			$user->phone_verified = true;
			$user->save();
			
			return $this->authenticateUser($user->getKey(), ['message' => 'Signed successfully.']);
			
		}
		
		public function user()
		{
			$user = User::findOrFail(Auth::user()->id);
			
			return $this->itemResponse($user);
		}
		
		public function refresh()
		{
			$user = User::findOrFail(Auth::user()->id);
			
			return $this->itemResponse($user);
		}
		
		public function signOut()
		{
			Auth::logout();
			
			return $this->arrayResponse([]);
		}
	}