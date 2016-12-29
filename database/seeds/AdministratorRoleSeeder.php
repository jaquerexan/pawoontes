<?php

use Illuminate\Database\Seeder;
use App\Role;

class AdministratorRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime=date('Y-m-d H:i:s');

        $data = ['name' => 'system_administrator','display_name' => 'Pawoon God','description' => 'administrator of system','created_at' => $datetime];
        $this->insertRole($data);
    }

    private function insertRole($data)
    {
        $role = (new Role())->where('name','=','system_administrator')->first();
        if(!isset($role))
        {
            $role = (new Role());            
        }
        $role->name = $data['name'];
        $role->status = 'active';
        $role->display_name = $data['display_name'];
        $role->description = $data['description'];
        $role->created_at = $data['created_at'];
        $role->save();
    }
}
