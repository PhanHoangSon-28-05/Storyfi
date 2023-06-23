<?php

namespace Database\Seeders;

use App\Models\Permisson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create Role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show Role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'group' => 'Role'],

            ['name' => 'create-category', 'display_name' => 'Create Category', 'group' => 'Category'],
            ['name' => 'update-category', 'display_name' => 'Update Category', 'group' => 'Category'],
            ['name' => 'show-category', 'display_name' => 'Show Category', 'group' => 'Category'],
            ['name' => 'delete-category', 'display_name' => 'Delete Category', 'group' => 'Category'],

            ['name' => 'create-product', 'display_name' => 'Create Product', 'group' => 'Product'],
            ['name' => 'update-product', 'display_name' => 'Update product', 'group' => 'Product'],
            ['name' => 'show-product', 'display_name' => 'Show product', 'group' => 'Product'],
            ['name' => 'delete-product', 'display_name' => 'Delete product', 'group' => 'Product'],

            ['name' => 'create-coupom', 'display_name' => 'Create Coupom', 'group' => 'Coupom'],
            ['name' => 'update-coupom', 'display_name' => 'Update Coupom', 'group' => 'Coupom'],
            ['name' => 'show-coupom', 'display_name' => 'Show Coupom', 'group' => 'Coupom'],
            ['name' => 'delete-coupom', 'display_name' => 'Delete Coupom', 'group' => 'Coupom'],
        ];

        foreach ($permissions as $item) {
            Permisson::updateOrCreate($item);
        }
    }
}
