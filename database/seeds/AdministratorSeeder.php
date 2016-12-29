<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminPermissionSeeder::class);
        $this->call(AdministratorUserSeeder::class);
        $this->call(AdministratorRoleSeeder::class);
        $this->call(AdministratorRoleUserSeeder::class);
    }
}
