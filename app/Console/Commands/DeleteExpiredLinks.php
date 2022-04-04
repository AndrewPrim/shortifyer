<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DeleteExpiredLinks extends Command
{
    protected $signature = 'invite_urls:delete_expired';

    protected $description = 'Just to delete already expired links';

    public function handle(): void
    {
        DB::table('invite_urls')
            ->where('expires_at', '<', Carbon::now())
            ->delete();
    }
}
