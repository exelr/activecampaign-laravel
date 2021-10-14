<?php


namespace Exelero\ActiveCampaignLaravel\Resources;


use Exception;
use Exelero\ActiveCampaignLaravel\Exceptions\RequestError;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class ActiveCampaignResource implements ActiveCampaignResourceInterface
{

    public string $endpoint;


    protected function request(): PendingRequest
    {
        return Http::withHeaders([
            'Api-Token' => config('activecampaign.api_key'),
        ]);
    }

    protected function endpoint(string $url = null): string
    {
        return config('activecampaign.api_url').'/api/3/'.$this->endpoint.'/'.$url;
    }

    /**
     * @param  object  $object
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

}
