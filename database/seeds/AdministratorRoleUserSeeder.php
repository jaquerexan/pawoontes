<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class AdministratorRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = (new User())->where('name','=','admin')->first();
        $role = (new Role())->where('name','=','system_administrator')->first();
        $datetime=date('Y-m-d H:i:s');

        $data = ['user_id' => $user->id, 'role_id' => $role->id];

        $this->insertRoleuser($data);
    }

    private function insertRoleuser($data)
    {
        $roleuser = DB::table('role_user')
            ->select('user_id','role_id')
            ->where('user_id','=',$data['user_id'])
            ->where('role_id','=',$data['role_id'])
            ->first();
        if(!isset($roleuser))
        {
            DB::table('role_user')->insert(
                ['role_id' => $data['role_id'], 'user_id' => $data['user_id']]
            );            
        }
    }
}
