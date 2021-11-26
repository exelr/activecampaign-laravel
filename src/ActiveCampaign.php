<?php

namespace Exelero\ActiveCampaignLaravel;

use Exelero\ActiveCampaignLaravel\Resources\Accounts;
use Exelero\ActiveCampaignLaravel\Resources\Contacts;

class ActiveCampaign
{
    private Accounts $accounts;
    private Contacts $contacts;

    public function __construct(Accounts $accounts, Contacts $contacts)
    {
        $this->accounts = $accounts;
        $this->contacts = $contacts;
    }

    public function accounts(): Accounts
    {
        return $this->accounts;
    }

    public function contacts(): Contacts
    {
        return $this->contacts;
    }


}
