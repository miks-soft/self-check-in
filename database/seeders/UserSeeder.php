<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('mediaI'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
        }

        $terminalUser = User::firstOrCreate(
            ['name' => 'terminal'],
            [
                'name'              => 'terminal',
                'email'             => 'terminal@gettsleep.ru',
                'password'          => bcrypt('xm!-=?sh9\U<]&CF'),
                'remember_token'    => Str::random(60),
            ]
        );

        if (!$terminalUser->tokens->firstWhere('name', 'api_keys'))
            $terminalUser->createToken('api_keys');
    }
}
