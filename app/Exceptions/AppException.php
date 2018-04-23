<?php

namespace App\Exceptions;

/**
 * Class AppException
 * @package App\Exceptions
 */
class AppException extends \Exception
{
	/**
	 * AppException constructor.
	 * @param string $message
	 * @param int $code
	 */
	public function __construct($message = "Application error", $code = 500)
	{
		parent::__construct($message, $code);
	}	
}