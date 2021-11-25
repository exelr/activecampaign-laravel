<?php

namespace Exelero\ActiveCampaignLaravel\Resources;

use Exelero\ActiveCampaignLaravel\ActiveCampaign;

/**
 * Class Contact
 * @package Exelero\ActiveCampaignLaravel\Resources
 */
class Contact extends ActiveCampaignResource
{
    public string $endpoint = 'contacts';

    /**
     * @throws \Exception
     */
    public function create(array $contact): object
    {
        return $this->response($this->request()->post($this->endpoint(), [
            'contact' => $contact,
        ])->object());
    }

    /**
     * @throws \Exception
     */
    public function update(string $id, array $contact): object
    {
        return $this->response($this->request()->put($this->endpoint($id), [
            'contact' => $contact,
        ])->object());
    }


}
