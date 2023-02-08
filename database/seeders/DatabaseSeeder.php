<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Merek;
use App\Models\Role;
// use App\Models\Pemesan;
// use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Seeder;

// use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'nama' => 'admin',
        ]);

        Role::create([
            'nama' => 'pengguna',
        ]);

        // User::create([
        //     'nama' => 'Rizki Sofyan',
        //     'id_role' => 1,
        //     'email' => 'rzkfyn@gmail.com',
        //     'username' => 'rzkfyn',
        //     'foto_profil' => 'admin.jpg',
        //     'password' => Hash::make('12345678')
        // ]);

        User::create([
            'nama' => 'Farhan',
            'id_role' => 1,
            'email' => 'farhan@gmail.com',
            'username' => 'farhan',
            'foto_profil' => 'admin2.jpeg',
            'password' => Hash::make('farhan123'),
        ]);
        User::create([
            'nama' => 'Rizki',
            'id_role' => 1,
            'email' => 'rizki@gmail.com',
            'username' => 'rizki',
            'foto_profil' => 'admin1.jpeg',
            'password' => Hash::make('rizki123'),
        ]);

        // User::create([
        //     'nama' => 'Komi Shouko',
        //     'id_role' => 2,
        //     'email' => 'shouko@itan.sch.jp',
        //     'username' => 'shouko',
        //     'foto_profil' => 'default.png',
        //     'password' => Hash::make('12345678')
        // ]);

        // Pemesan::create([
        //     'id_user' => 2,
        //     'nama_lengkap' => 'Komi Shouko',
        //     'alamat_lengkap' => 'Tokyo prefektur siganshina nomor 7752',
        //     'no_hp' => '0812344567789'
        // ]);

        // Pesanan::create([
        //     'id_pemesan' => 1,
        //     'id_mobil' => 1,
        //     'tanggal_pesan' => '2022-12-12',
        //     'status_pesanan' => 'tertunda'
        // ]);

        Merek::create([
            'nama' => 'Toyota',
            'slug' => 'toyota',
        ]);

        Merek::create([
            'nama' => 'Honda',
            'slug' => 'honda',
        ]);

        Merek::create([
            'nama' => 'Mazda',
            'slug' => 'mazda',
        ]);

        Merek::create([
            'nama' => 'Daihatsu',
            'slug' => 'daihatsu',
        ]);

        Merek::create([
            'nama' => 'Nissan',
            'slug' => 'nissan',
        ]);

        Merek::create([
            'nama' => 'Ford',
            'slug' => 'ford',
        ]);
    }
}
