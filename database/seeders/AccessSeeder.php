<?php

namespace Database\Seeders;

use App\Models\Config\Access;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get roles
        $users = config('access.user_id_exceptions');

        // delete all access for user_id_exceptions
        Access::whereIn('user_id', $users)->delete();

        // loop $users
        foreach ($users as $user) {

            // get permission list by code
            $accessList = collect(config('access.access_list'));

            // looping $accessList
            foreach ($accessList as $permissionList) {

                // get permissions
                $permissions = $permissionList['permissions'];

                // looping $permissionList
                foreach ($permissions as $permission) {

                    // create data
                    Access::create([
                        'user_id' => $user,
                        'code' => $permissionList['code'],
                        'permission' => $permission,
                        'is_allowed' => true,
                    ]);
                }
            }
        }
    }
}
