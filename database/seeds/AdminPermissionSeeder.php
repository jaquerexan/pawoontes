<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;
use App\PermissionRole;
use App\Role;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime=date('Y-m-d H:i:s');

        $datas = [
            ['name' => 'user_index','created_at' => $datetime],
            ['name' => 'user_create','created_at' => $datetime],
            ['name' => 'user_store','created_at' => $datetime],
            ['name' => 'user_show','created_at' => $datetime],
            ['name' => 'user_edit','created_at' => $datetime],
            ['name' => 'user_editpass','created_at' => $datetime],
            ['name' => 'user_update','created_at' => $datetime],
            ['name' => 'user_change','created_at' => $datetime],
            ['name' => 'user_destroy','created_at' => $datetime],
            ['name' => 'user_indexdata','created_at' => $datetime],

            ['name' => 'role_index','created_at' => $datetime],
            ['name' => 'role_create','created_at' => $datetime],
            ['name' => 'role_store','created_at' => $datetime],
            ['name' => 'role_show','created_at' => $datetime],
            ['name' => 'role_edit','created_at' => $datetime],
            ['name' => 'role_update','created_at' => $datetime],
            ['name' => 'role_destroy','created_at' => $datetime],
            ['name' => 'role_indexdata','created_at' => $datetime],

            ['name' => 'permission_index','created_at' => $datetime],
            ['name' => 'permission_create','created_at' => $datetime],
            ['name' => 'permission_store','created_at' => $datetime],
            ['name' => 'permission_show','created_at' => $datetime],
            ['name' => 'permission_edit','created_at' => $datetime],
            ['name' => 'permission_update','created_at' => $datetime],
            ['name' => 'permission_destroy','created_at' => $datetime],
            ['name' => 'permission_indexdata','created_at' => $datetime],

            ['name' => 'customer_index','created_at' => $datetime],
            ['name' => 'customer_create','created_at' => $datetime],
            ['name' => 'customer_store','created_at' => $datetime],
            ['name' => 'customer_show','created_at' => $datetime],
            ['name' => 'customer_edit','created_at' => $datetime],
            ['name' => 'customer_update','created_at' => $datetime],
            ['name' => 'customer_destroy','created_at' => $datetime],
            ['name' => 'customer_indexdata','created_at' => $datetime],
        ];

        foreach ($datas as $key => $data) {
            $this->insertPermission($data);
        }
    }

    private function insertPermission($data)
    {
        $permission = (new Permission())->select('id','name')->where('name','=',$data['name'])->first();

        if(!isset($permission))
        {
            $permission = (new Permission());
            $permission->status = 'active';
            $permission->name = $data['name'];
            $permission->display_name = $data['name'];
            $permission->created_at = $data['created_at'];
            $permission->save();
        }

        $role = (new Role())->select('id','name')->where('name','=','system_administrator')->first();
        if(!isset($role))
        {
            $this->call(AdministratorRoleSeeder::class);
            $role = (new Role())->select('id','name')->where('name','=','system_administrator')->first();
        }

        $permissionrole = DB::table('permission_role')->select('permission_id','role_id')->where('permission_id','=',$permission->id)->where('role_id','=',$role->id)->first();
        if(!isset($permissionrole))
        {
            $permissionrole = (new PermissionRole());
            DB::table('permission_role')->insert(
                ['permission_id' => $permission->id, 'role_id' => $role->id]
            );
            print_r($data['name'].' added to '.$role->name.PHP_EOL);
        }
        else
        {
            print_r($data['name'].' already exist in '.$role->name.PHP_EOL);
        }
    }
}
