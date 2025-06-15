<?php

namespace Database\Seeders;

use App\Models\Config\AccessTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create access template
        $accessTemplate = AccessTemplate::create([
            'name' => 'Full Access',
            'description' => 'This template grants full access to all features and functionalities.',
        ]);

        // delete all access for user_id_exceptions
        $accessTemplate->details()->delete();

        // get access list from config
        $accessList = config('access.access_list');

        // loop through access list
        foreach ($accessList as $permissionList) {

            // get permissions
            $permissions = $permissionList['permissions'];

            // looping $permissionList
            foreach ($permissions as $permission) {

                // Create a new access template detail for each permission list
                $accessTemplate->details()->create([
                    'access_template_id' => $accessTemplate->id,
                    'code' => $permissionList['code'],
                    'permission' => $permission,
                    'is_allowed' => true,
                ]);
            }
        }
    }
}
