<?php

namespace Exelero\ActiveCampaignLaravel\Exceptions;

use ErrorException;
use Illuminate\Http\Client\Response;

class RequestError extends ErrorException
{
    public const BAD_REQUEST = 400;
    public const CONFLICT = 409;

    public function __construct(Response $response)
    {
        parent::__construct($response->body(), $response->status());
    }
}
