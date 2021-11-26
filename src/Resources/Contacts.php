<?php

namespace Exelero\ActiveCampaignLaravel\Resources;

/**
 * Class Contacts
 * @package Exelero\ActiveCampaignLaravel\Resources
 */
class Contacts extends ActiveCampaignResource
{
    protected string $endpoint = 'contacts';
    protected string $field = "contact";

}
