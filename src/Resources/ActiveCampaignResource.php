<?php

namespace Exelero\ActiveCampaignLaravel\Resources;

use Exception;
use Exelero\ActiveCampaignLaravel\ActiveCampaign;
use Exelero\ActiveCampaignLaravel\Exceptions\RequestError;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * * @mixin ActiveCampaign
 */
abstract class ActiveCampaignResource implements ActiveCampaignResourceInterface
{
    protected string $endpoint;
    protected string $field;

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
     * @param Response $response
     * @return Response
     * @throws Throwable
     */
    protected function response(Response $response): object
    {

        throw_if(!$response->successful(), new RequestError($response));

        return $response;
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function list(array $filters = []): object
    {
        return $this->response($this->request()->get($this->endpoint("", $filters)));
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function get(string $id): object
    {
        return $this->response($this->request()->get($this->endpoint($id)));
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function delete(string $id): object
    {
        return $this->response($this->request()->delete($this->endpoint($id)));
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function create(array $data): object
    {
        return $this->response($this->request()->post($this->endpoint(), $data));
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function update(string $id, array $data): object
    {
        return $this->response($this->request()->put($this->endpoint($id), $data));
    }

}
