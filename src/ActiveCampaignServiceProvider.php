<?php

namespace Exelero\ActiveCampaignLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ActiveCampaignServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('active-campaign')
            ->hasConfigFile('activecampaign');
//            ->hasMigration('create_activecampaign-laravel_table')
//            ->hasCommand(ActiveCampaignLaravelCommand::class);

        $this->app->bind('active-campaign', function ($app) {
            return $app->make(ActiveCampaign::class);
        });
    }
}
