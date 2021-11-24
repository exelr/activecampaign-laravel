<?php

namespace Exelero\ActiveCampaignLaravel;

use Exelero\ActiveCampaignLaravel\Resources\Accounts;

class ActiveCampaign
{
    /**
     * @var Accounts
     */
    public $accounts;

    public function __construct(Accounts $accounts)
    {
        $this->accounts = $accounts;
    }

    public function accounts(): Accounts
    {
        return $this->accounts;
    }
}
