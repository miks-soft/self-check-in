<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategoriesTableSeeder::class,
            CustomSettingsTableSeeder::class,
            RoomTypesTableSeeder::class,
            RoomTableSeeder::class,
            FeaturesTableSeeder::class,
            PaysystemsTableSeeder::class,
            ContactsTableSeeder::class,
            BookingsTableSeeder::class,
            LocalizationsTableSeeder::class,
            LocalesTableSeeder::class,
            RoomsBedsDataRow::class,
        ]);
    }
}
