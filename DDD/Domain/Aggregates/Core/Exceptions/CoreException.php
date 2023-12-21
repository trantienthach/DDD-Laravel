<?php

namespace DDD\Domain\Aggregates\Core\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class CoreException extends Exception
{
    public $message;

    public $code;

    public $statusCode;

    public $extraData;

    public function __construct($message = null, $code = null, $statusCode = JsonResponse::HTTP_INTERNAL_SERVER_ERROR, $extraData = [])
    {
        $this->message = $message;
        $this->code = $code;
        $this->statusCode = $statusCode;
        $this->extraData = $extraData;

        dd('build CoreException');
    }
}
