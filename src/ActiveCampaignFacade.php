<?php

namespace Exelero\ActiveCampaignLaravel;

use Exelero\ActiveCampaignLaravel\Resources\Accounts;
use Exelero\ActiveCampaignLaravel\Resources\Contacts;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Exelero\ActiveCampaignLaravel\ActiveCampaign
 * @method static Accounts accounts()
 * @method static Contacts contacts()
 */
class ActiveCampaignFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'active-campaign';
    }
}
