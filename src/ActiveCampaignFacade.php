<?php

namespace Exelero\ActiveCampaignLaravel;

use Exelero\ActiveCampaignLaravel\Resources\Accounts;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Exelero\ActiveCampaignLaravel\ActiveCampaign
 * @method static Accounts accounts()
 */
class ActiveCampaignFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'active-campaign';
    }
}
