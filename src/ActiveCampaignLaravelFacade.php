<?php

namespace Exelero\ActiveCampaignLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exelero\ActiveCampaignLaravel\ActiveCampaignLaravel
 */
class ActiveCampaignLaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'activecampaign-laravel';
    }
}
