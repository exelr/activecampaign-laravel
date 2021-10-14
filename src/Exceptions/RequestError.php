<?php

namespace Exelero\ActiveCampaignLaravel\Exceptions;

use ErrorException;
use JetBrains\PhpStorm\Pure;

class RequestError extends ErrorException
{

    public const BAD_REQUEST = 400;
    public const CONFLICT = 409;

    public object $error;

    #[Pure] public function __construct(object $error)
    {
        $this->error = $error;
        parent::__construct($error->title, match ($error->code) {
            'duplicate' => self::CONFLICT,
            default => self::BAD_REQUEST,
        });
    }


}
