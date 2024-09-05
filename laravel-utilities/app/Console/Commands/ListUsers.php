<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    protected $signature = 'users:list {--limit=10}';
    protected $description = 'List all users in the database';

    public function handle()
    {
        $limit = $this->option('limit');
        $users = User::take($limit)->get();

        if ($users->count() > 0) {
            $this->info("Listing {$users->count()} users:");
            $this->table(
                ['ID', 'Name', 'Email', 'Created At'],
                $users->map(function ($user) {
                    return [
                        $user->id,
                        $user->name,
                        $user->email,
                        $user->created_at->toDateTimeString()
                    ];
                })
            );
        } else {
            $this->warn("No users found in the database.");
        }
    }
}