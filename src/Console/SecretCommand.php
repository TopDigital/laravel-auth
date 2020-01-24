<?php

namespace TopDigital\Auth\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class SecretCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:secret';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a client secret for OAuth';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // @todo get new client_id from DB

        $secret = Str::random(40);

        Passport::client()->forceFill([
            'name' => 'CMS',
            'secret' => $secret,
            'redirect' => env('APP_URL', 'https://homestead.test') .'/api/login',
            'personal_access_client' => true,
            'password_client' => false,
            'revoked' => false,
        ])->save();
        Passport::personalAccessClient()->forceFill([
            'client_id' => 1,
        ])->save();

        $this->line('<comment>Client ID:</comment> 1');
        $this->line('<comment>Client secret:</comment> '. $secret);
    }
}
