<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;

class GenerateAccessTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:access-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and set access tokens for existing users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $accessToken = Str::random(60); // Generate a random access token
            $user->forceFill([
                'api_token' => hash('sha256', $accessToken),
            ])->save();
        }

        $this->info('Access tokens generated and set for existing users.');
        
        return Command::SUCCESS;
    }
}
