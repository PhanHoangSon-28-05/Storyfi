<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system',],
            ['name' => 'admin', 'display_name' => 'Admin', 'group' => 'system'],
            ['name' => 'employee', 'display_name' => 'Employee', 'group' => 'system'],
            ['name' => 'manager', 'display_name' => 'Manager', 'group' => 'system'],
            ['name' => 'user', 'display_name' => 'User', 'group' => 'system'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create Role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show Role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'group' => 'Role'],

            ['name' => 'create-title', 'display_name' => 'Create Title', 'group' => 'Title'],
            ['name' => 'update-title', 'display_name' => 'Update Title', 'group' => 'Title'],
            ['name' => 'show-title', 'display_name' => 'Show Title', 'group' => 'Title'],
            ['name' => 'delete-title', 'display_name' => 'Delete Title', 'group' => 'Title'],

            ['name' => 'create-category', 'display_name' => 'Create Category', 'group' => 'Category'],
            ['name' => 'update-category', 'display_name' => 'Update Category', 'group' => 'Category'],
            ['name' => 'show-category', 'display_name' => 'Show Category', 'group' => 'Category'],
            ['name' => 'delete-category', 'display_name' => 'Delete Category', 'group' => 'Category'],

            ['name' => 'create-story', 'display_name' => 'Create Story', 'group' => 'Story'],
            ['name' => 'update-story', 'display_name' => 'Update Story', 'group' => 'Story'],
            ['name' => 'show-story', 'display_name' => 'Show Story', 'group' => 'Story'],
            ['name' => 'delete-story', 'display_name' => 'Delete Story', 'group' => 'Story'],

            ['name' => 'create-chapter', 'display_name' => 'Create Chapter', 'group' => 'Chapter'],
            ['name' => 'update-chapter', 'display_name' => 'Update Chapter', 'group' => 'Chapter'],
            ['name' => 'show-chapter', 'display_name' => 'Show Chapter', 'group' => 'Chapter'],
            ['name' => 'delete-chapter', 'display_name' => 'Delete Chapter', 'group' => 'Chapter'],

        ];

        foreach ($permissions as $item) {
            Permission::updateOrCreate($item);
        }
    }
}
