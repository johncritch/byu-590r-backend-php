<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserDeviceSummary;

class EmailUserDeviceCollection extends Command
{
    protected $signature = 'email:user-device-collection';
    protected $description = 'Sends each user an email listing the devices in their collection';

    public function handle()
    {
        $users = User::with(['devices.details'])->get();

        foreach ($users as $user) {
            if ($user->devices->count() > 0) {
                Mail::to($user->email)->send(new UserDeviceSummary($user));
            }
        }

        $this->info('All device summary emails have been sent.');
        return Command::SUCCESS;
    }
}