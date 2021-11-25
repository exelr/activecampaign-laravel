<?php

namespace Exelero\ActiveCampaignLaravel\Exceptions;

use ErrorException;

class RequestError extends ErrorException
{
    public const BAD_REQUEST = 400;
    public const CONFLICT = 409;

    public object $error;


    public function __construct(object $error)
    {
        $this->error = $error;

        parent::__construct($error->title, $error->code === 'duplicate' ? self::CONFLICT : self::BAD_REQUEST);
    }
}
