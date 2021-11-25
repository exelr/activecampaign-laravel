<?php

namespace Exelero\ActiveCampaignLaravel\Resources;

use Exception;
use Exelero\ActiveCampaignLaravel\ActiveCampaign;
use Exelero\ActiveCampaignLaravel\Exceptions\RequestError;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * * @mixin ActiveCampaign
 */
abstract class ActiveCampaignResource implements ActiveCampaignResourceInterface
{
    public string $endpoint;

    protected function request(): PendingRequest
    {
        return Http::withHeaders([
            'Api-Token' => config('activecampaign.api_key'),
        ]);
    }

    protected function endpoint(string $url = null, array $query = []): string
    {
        return config('activecampaign.api_url') . '/api/3/' . $this->endpoint . '/' . $url . (!empty($query) ? '?' . http_build_query($query) : '');
    }

    /**
     * @param object $object
     * @return object
     * @throws Exception
     */
    protected function response(object $object): object
    {
        if (property_exists($object, 'errors')) {
            $error = $object->errors[0];

            throw new RequestError($error);
        }

        return $object;
    }

    public function list(array $filters = []): object
    {
        return $this->request()->get($this->endpoint("", $filters))->object();
    }

    /**
     * @throws Exception
     */
    public function delete(string $id): object
    {
        return $this->response($this->request()->delete($this->endpoint($id))->object());
    }
}
