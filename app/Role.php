<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	/**
	 * [permissions description]
	 * @return [type] [description]
	 */
	public function permissions()
	{
        return $this->belongsToMany('app\Permission','permission_role')->withTimestamps();
    }

    /**
     * [users description]
     * @return [type] [description]
     */
	public function users()
	{
        return $this->belongsToMany('app\User','role_user')->withTimestamps();
    }
}
