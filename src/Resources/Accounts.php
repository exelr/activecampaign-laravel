<?php


namespace Exelero\ActiveCampaignLaravel\Resources;


use Exelero\ActiveCampaignLaravel\ActiveCampaign;

/**
 * Trait Accounts
 * @package Exelero\ActiveCampaignLaravel\Resources
 * @mixin ActiveCampaign
 */
class Accounts extends ActiveCampaignResource
{

    public string $endpoint = 'accounts';


    public function list(): object
    {
        return $this->request()->get($this->endpoint())->object();
    }


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

    public function delete($id): object
    {
        return $this->response($this->request()->delete($this->endpoint($id))->object());
    }



}
