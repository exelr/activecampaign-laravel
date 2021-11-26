<?php

namespace Exelero\ActiveCampaignLaravel\Resources;

/**
 * Class Contacts
 * @package Exelero\ActiveCampaignLaravel\Resources
 */
class Contacts extends ActiveCampaignResource
{
    protected string $endpoint = 'contacts';

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
