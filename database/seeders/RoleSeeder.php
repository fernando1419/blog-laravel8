<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $role1 = Role::create(['name' => 'Admin']);
      $role2 = Role::create(['name' => 'Blogger']);

      Permission::create(['name' => 'admin.home', 'description' => 'Display Dashboard'])->syncRoles([$role1, $role2]);

      Permission::create(['name' => 'admin.users.index', 'description' => 'Display Users'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.users.edit', 'description' => 'Create Role'])->syncRoles([$role1]);

      Permission::create(['name' => 'admin.categories.index', 'description' => 'Display Categories'])->syncRoles([$role1, $role2]); // blogger can only list categories, not create, edit or destroy.
      Permission::create(['name' => 'admin.categories.create', 'description' => 'Create Category'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.categories.edit', 'description' => 'Edit Category'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Delete Category'])->syncRoles([$role1]);

      Permission::create(['name' => 'admin.tags.index', 'description' => 'Display Tags'])->syncRoles([$role1, $role2]); // blogger can only list tags, not create, edit or destroy.
      Permission::create(['name' => 'admin.tags.create', 'description' => 'Create Tag'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.tags.edit', 'description' => 'Edit Tag'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.tags.destroy', 'description' => 'Delete Tag'])->syncRoles([$role1]);

      Permission::create(['name' => 'admin.posts.index', 'description' => 'Display Posts'])->syncRoles([$role1, $role2]);
      Permission::create(['name' => 'admin.posts.create', 'description' => 'Create Post'])->syncRoles([$role1, $role2]);
      Permission::create(['name' => 'admin.posts.edit', 'description' => 'Edit Post'])->syncRoles([$role1, $role2]);
      Permission::create(['name' => 'admin.posts.destroy', 'description' => 'Delete Post'])->syncRoles([$role1, $role2]);
   }
}
