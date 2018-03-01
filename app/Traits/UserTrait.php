<?php
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 18/01/2017
	 * Time: 17:44
	 */
	
	namespace App\Traits;
	
	
	use App\Exceptions\ErrorCodes;
	use App\Exceptions\WrappedException;
	use App\User;
	use JWTAuth;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
	
	trait UserTrait
	{
		
		/**
		 * @param int   $id
		 * @param array $relations
		 * @return \App\User
		 * @throws WrappedException
		 */
		public function findUser(int $id, array $relations = null)
		{
			if (!is_null($relations)) {
				$user = User::with($relations)->find($id);
			} else {
				$user = User::find($id);
			}
			
			if (is_null($user)) {
				throw new WrappedException(new NotFoundHttpException('User not found'), ErrorCodes::USER_NOT_FOUND);
			}
			
			return $user;
		}
		
	}