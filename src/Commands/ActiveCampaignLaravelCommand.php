<?php

namespace Exelero\ActiveCampaignLaravel\Commands;

use Illuminate\Console\Command;

class ActiveCampaignLaravelCommand extends Command
{
    public $signature = 'activecampaign-laravel';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
