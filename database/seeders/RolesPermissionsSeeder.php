<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $super_admin = Role::create(['name' => 'super-admin', 'order' => 1]);
        $admin = Role::create(['name' => 'admin', 'order' => 2]);
        $mod = Role::create(['name' => 'moderator', 'order' => 3]);
        $vip = Role::create(['name' => 'vip', 'order' => 4]);
        $premium = Role::create(['name' => 'premium', 'order' => 5]);

//        $resources = [
//            'view-any-',
//            'view-',
//            'create-',
//            'update-',
//            'delete-any-',
//            'delete-',
//            'restore-any-',
//            'restore-',
//            'force-delete-any-',
//            'force-delete-',
//            'reorder-',

//            'delete-any-',
//            'restore-any-',
//            'force-delete-any-',
//            'reorder-',
//        ];

        $permissions = [
            // Super Admin
            'super-admin',

            // Access Page
            'access-filament',

            // Manage Users
            'view-any-users',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            'delete-any-user',
            'restore-any-user',
            'force-delete-any-user',
            'reorder-user',

            // Manage Roles
            'view-any-roles',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            'force-delete-role',
            'delete-any-role',
            'restore-any-role',
            'force-delete-any-role',
            'reorder-role',

            // Manage Permissions
            'view-any-permissions',
            'view-permission',
            'update-permission',

            // Manage Category
            'view-any-category',
            'view-category',
            'create-category',
            'update-category',
            'delete-any-category',
            'delete-category',
            'restore-any-category',
            'restore-category',
            'force-delete-any-category',
            'force-delete-category',
            'reorder-category',

            // Manage Tags
            'view-any-tags',
            'view-tag',
            'create-tag',
            'update-tag',
            'delete-tag',
            'restore-tag',
            'force-delete-tag',
            'delete-any-tag',
            'restore-any-tag',
            'force-delete-any-tag',
            'reorder-tag',

            // Manage Posts
            'view-any-posts',
            'view-post',
            'create-post',
            'update-post',
            'delete-post',
            'restore-post',
            'force-delete-post',
            'view-nsfw-post',
            'delete-any-post',
            'restore-any-post',
            'force-delete-any-post',
            'reorder-post',

            // Download Link
            'view-any-download-link',
            'view-download-link',
            'update-download-link',



//            // Manage Comment
//            'view-any-comment',
//            'view-comment',
//            'create-comment',
//            'update-comment',
//            'delete-comment',
//            'restore-comment',
//            'force-delete-comment',
//            'delete-any-comment',
//            'restore-any-comment',
//            'force-delete-any-comment',
//            'reorder-comment',
//
//            // Membership
//            'skip-short-link',
//            'hide-sponsor',
//
//            // Activity Logs
//            'view-any-activity-log',
//            'view-activity-log',
//
//            // Manage Jobs Failed
//            'manage-failed-jobs',
//
//            // Logs Viewer
//            'access-logs-viewer',
//
//            // Application Health
//            'access-health-check',
//
//            // Live View
//            'view-any-live-view',
//            'view-live-view',
//            'create-live-view',
//            'update-live-view',
//            'delete-live-view',
//            'restore-live-view',
//            'force-delete-live-view',
//            'delete-any-live-view',
//            'restore-any-live-view',
//            'force-delete-any-live-view',
//            'reorder-live-view',
        ];


        // Create Permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Super Admin Permissions
        $super_admin->syncPermissions([
            // Super Admin
            'super-admin',
        ]);

        // Admin Permissions
        $admin->syncPermissions([
            // Access Page
            'access-filament',

            // Manage Users
            'view-any-users',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            'delete-any-user',
            'restore-any-user',

            // Manage Roles
            'view-any-roles',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            'delete-any-role',
            'restore-any-role',
            'reorder-role',

            // Manage Permissions
            'view-any-permissions',
            'view-permission',

            // Manage Category
            'view-any-category',
            'view-category',
            'create-category',
            'update-category',
            'delete-any-category',
            'delete-category',
            'restore-any-category',
            'restore-category',
            'reorder-category',

            // Manage Tags
            'view-any-tags',
            'view-tag',
            'create-tag',
            'update-tag',
            'delete-tag',
            'restore-tag',
            'delete-any-tag',
            'restore-any-tag',
            'reorder-tag',

            // Manage Posts
            'view-any-posts',
            'view-post',
            'create-post',
            'update-post',
            'delete-post',
            'restore-post',
            'view-nsfw-post',
            'delete-any-post',
            'restore-any-post',
            'reorder-post',

            // Download Link
            'view-any-download-link',
            'view-direct-download-link',
        ]);

        // Moderator Permissions
        $mod->syncPermissions([
            // Access Page
            'access-filament',

            // Manage Users
            'view-any-users',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            'delete-any-user',
            'restore-any-user',

            // Manage Roles
            'view-any-roles',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            'force-delete-role',
            'delete-any-role',
            'restore-any-role',
            'force-delete-any-role',
            'reorder-role',

            // Manage Permissions
            'view-any-permissions',
            'view-permission',
            'update-permission',

            // Manage Category
            'view-any-category',
            'view-category',
            'create-category',
            'update-category',
            'delete-any-category',
            'delete-category',
            'restore-any-category',
            'restore-category',
            'force-delete-any-category',
            'force-delete-category',
            'reorder-category',

            // Manage Tags
            'view-any-tags',
            'view-tag',
            'create-tag',
            'update-tag',
            'delete-tag',
            'restore-tag',
            'force-delete-tag',
            'delete-any-tag',
            'restore-any-tag',
            'force-delete-any-tag',
            'reorder-tag',

            // Manage Posts
            'view-any-posts',
            'view-post',
            'create-post',
            'update-post',
            'delete-post',
            'restore-post',
            'force-delete-post',
            'view-nsfw-post',
            'delete-any-post',
            'restore-any-post',
            'force-delete-any-post',
            'reorder-post',

            // Download Link
            'view-any-download-link',
            'view-direct-download-link',
        ]);

        User::find(1)->syncRoles('super-admin');
        User::find(2)->syncRoles('admin');
        User::find(3)->syncRoles('moderator');
    }
}
