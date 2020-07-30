<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Illuminate\Support\Str;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'Admin',
            'slug'          => 'admin',
            'description'   => 'Tiene acceso total del sistema',
            'special'       => 'all-access'
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@admin.com',
            'photo' => 'image/icons/default.jpg',
            'phone'         => rand(5576324923, 5576324923),
            'postal_code'   => rand(12345, 99999),
            'pedidos'       => 'RECIBIR',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
        ])->each(function(App\User $user){
            $user->role()->attach([
                1
            ]);
        });
    }
}
