<?php namespace PhotoShots\Exceptions;

  use Exception;
  use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
 +use Symfony\Component\HttpKernel\Exception\HttpException;
  
  class Handler extends ExceptionHandler {
  
 @@ -36,7 +37,32 @@ public function report(Exception $e)
  	 */
  	public function render($request, Exception $e)
  	{
 -		return parent::render($request, $e);
 +		if(config('app.debug'))
 +		{
 +			return parent::render($request, $e);
 +		}
 +		elseif ($this->isHttpException($e))
 +		{
 +			return $this->renderHttpException($e);
 +		}
 +		else
 +		{
 +			return redirect('/')->withErrors('Unexpected Error. Try later.');
 +		}
 +	}
 +
 +	protected function renderHttpException(HttpException $e)
 +	{
 +		$status = $e->getStatusCode();
 +
 +		if (view()->exists("errors.{$status}"))
 +		{
 +			return response()->view("errors.{$status}", [], $status);
 +		}
 +		else
 +		{
 +			return response()->view("errors.default", [], $status);
 +		}
  	}
  
  }