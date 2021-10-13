<?php

namespace Exelero\ActiveCampaignLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Exelero\ActiveCampaignLaravel\Commands\ActiveCampaignLaravelCommand;

class ActiveCampaignLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('activecampaign-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_activecampaign-laravel_table')
            ->hasCommand(ActiveCampaignLaravelCommand::class);
    }
}
