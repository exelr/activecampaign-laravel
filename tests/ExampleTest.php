<?php

use Exelero\ActiveCampaignLaravel\ActiveCampaignFacade;

it('can CRUD account', function () {
    $name = 'example1';
    $rename = 'rename1';
    $create = ActiveCampaignFacade::accounts()->create($name);
    $id = $create->account->id;
    $update = ActiveCampaignFacade::accounts()->update($id, $rename, null);
    $delete = ActiveCampaignFacade::accounts()->delete($id);
    expect($create)->toBeObject()->toHaveProperty('account');
    expect($update)->toBeObject()->toHaveProperty('account');
    expect($delete)->toMatchObject(json_decode('{}'));
});
