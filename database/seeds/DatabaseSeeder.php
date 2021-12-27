<?php

//use LocationsTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\StatesTableSeeder;
use Database\Seeders\DistrictTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
           // PermissionsTableSeeder::class,
            /*RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,*/
            /*CategoriesTableSeeder::class,
            LocationsTableSeeder::class,
            CompaniesTableSeeder::class,*/
            //JobsTableSeeder::class,
          /*  StatesTableSeeder::class,
            DistrictTableSeeder::class*/
        ]);
    }
}
