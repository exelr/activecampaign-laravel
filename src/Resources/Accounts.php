<?php

namespace Exelero\ActiveCampaignLaravel\Resources;

/**
 * Trait Accounts
 * @package Exelero\ActiveCampaignLaravel\Resources
 */
class Accounts extends ActiveCampaignResource
{

    protected string $endpoint = 'accounts';

    public function create(string $name, string $url = null): object
    {
        return $this->response($this->request()->post($this->endpoint(), [
            'account' => [
                'name' => $name,
                'accountUrl' => $url,
            ],
        ])->object());
    }

    public function update($id, string $name, string $url = null): object
    {
        return $this->response($this->request()->put($this->endpoint($id), [
            'account' => [
                'name' => $name,
                'accountUrl' => $url,
            ],
        ])->object());
    }
}
