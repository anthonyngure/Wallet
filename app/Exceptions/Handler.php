<?php
	
	namespace App\Exceptions;
	
	use Exception;
	use Illuminate\Auth\AuthenticationException;
	use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
	use Illuminate\Validation\ValidationException;
	
	class Handler extends ExceptionHandler
	{
		/**
		 * A list of the exception types that should not be reported.
		 *
		 * @var array
		 */
		protected $dontReport = [
			\Illuminate\Auth\AuthenticationException::class,
			\Illuminate\Auth\Access\AuthorizationException::class,
			\Symfony\Component\HttpKernel\Exception\HttpException::class,
			\Illuminate\Database\Eloquent\ModelNotFoundException::class,
			\Illuminate\Session\TokenMismatchException::class,
			\Illuminate\Validation\ValidationException::class,
		];
		
		/**
		 * Report or log an exception.
		 *
		 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
		 *
		 * @param  \Exception $exception
		 * @return void
		 * @throws \Exception
		 */
		public function report(Exception $exception)
		{
			parent::report($exception);
		}
		
		/**
		 * Render an exception into an HTTP response.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \Exception               $exception
		 * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
		 */
		public function render($request, Exception $exception)
		{
			if ($request->expectsJson()) {
				if ($exception instanceof WrappedException) {
					$meta = array('code' => $exception->getErrorCode(), 'message' => $exception->getErrorMessage());
					if (empty($exception->getErrorData())) {
						$data = (object)array();
					} else {
						$data = $exception->getErrorData();
					}
					
					return response()->json(['meta' => $meta, 'data' => $data], 422);
					
				} elseif ($exception instanceof ValidationException) {
					$meta = ['message' => 'Validation error!', 'code' => ErrorCodes::VALIDATION_ERROR];
					$response = array('meta' => $meta, "data" => $exception->validator->getMessageBag()->toArray());
					
					return response()->json($response, 422);
					
				} elseif ($exception instanceof AuthenticationException) {
					$meta = array('message' => $exception->getMessage(), 'code' => ErrorCodes::UNAUTHORIZED);
					
					return response()->json(['meta' => $meta, 'data' => (object)array()], 401);
					
				} else {
					return parent::render($request, $exception);
				}
			} else {
				return parent::render($request, $exception);
			}
		}
		
		/**
		 * Convert an authentication exception into an unauthenticated response.
		 *
		 * @param  \Illuminate\Http\Request                 $request
		 * @param  \Illuminate\Auth\AuthenticationException $exception
		 * @return \Illuminate\Http\Response
		 */
		protected function unauthenticated($request, AuthenticationException $exception)
		{
			if ($request->expectsJson()) {
				//return response()->json(['error' => 'Unauthenticated.'], 401);
				$meta = array('message' => $exception->getMessage(), 'code' => ErrorCodes::UNAUTHORIZED);
				
				return response()->json(['data' => (object)array(), 'meta' => $meta], 401);
			} else {
				return redirect()->guest(route('login'));
			}
		}
	}
