<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DeactivateExpiredUsers extends Command
{
    protected $signature = 'users:deactivate-expired';
    protected $description = 'Deactivate users who have been activated for more than one year';

    public function handle()
    {
        $oneYearAgo = Carbon::now()->subYear();
        User::where('activated', true)
            ->where('activated_at', '<=', $oneYearAgo)
            ->update(['activated' => false]);

        $this->info('Expired users have been deactivated.');
    }
}
