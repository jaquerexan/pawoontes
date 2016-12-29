<?php

use Illuminate\Database\Seeder;
use Modules\Company\Entities\Company;
use Modules\Company\Entities\CompanyUser;
use App\User;

class AdministratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime=date('Y-m-d H:i:s');

        $data = ['name' => 'admin', 'email' => 'admin@pawoon.com', 'password' => 'admin','created_at' => $datetime];

        $this->insertUser($data);
    }

    public function insertUser($data)
    {
        /*
        $company = (new Company())->where('cmp_name','=','cuboid')->first();
        if(!isset($company))
        {
            $this->call(AdministratorCompanySeeder::class);
            $company = (new Company())->where('cmp_name','=','cuboid')->first();
        }
        */

        $user = (new User())->where('name','=','admin')->first();
        if(!isset($user))
        {
            $user = (new User());
            $user->name = $data['name'];
            $user->status = 'active';
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->created_at = $data['created_at'];
            $user->save();
        }
        /*
        $companyuser = (new CompanyUser())->where('user_id','=',$user->user_id)->where('cmp_id','=',$company->cmp_id)->first();
        if(!isset($companyuser))
        {
            $companyuser = (new CompanyUser());
            $companyuser->status = 'active';
            $companyuser->cmp_id = $company->cmp_id;
            $companyuser->user_id = $user->id;
            $companyuser->created_at = $data['created_at'];
            $companyuser->save();
        }
        */
    }
}
