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

        Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $mod = Role::create(['name' => 'moderator']);

//        $resources = [
//            'view-any',
//            'view',
//            'create',
//            'update',
//            'delete',
//            'restore',
//            'force-delete',
//        ];

        $permissions = [
            // Access Page
            'access-filament',
            // Manage Users
            'view-any-user',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            'force-delete-user',
            // Manage Roles
            'view-any-role',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            'force-delete-role',
            // Manage Permissions
            'view-any-permission',
            'view-permission',
            'update-permission',
            // Activity Logs
            'view-any-activity-log',
            'view-activity-log',
            // Manage Jobs Failed
            'manage-failed-jobs',
            // Logs Viewer
            'access-logs-viewer',
            // Application Health
            'access-health-check',
            // Comment
            'view-any-comment',
            'view-comment',
            'create-comment',
            'update-comment',
            'delete-comment',
            'restore-comment',
            'force-delete-comment',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->syncPermissions([
            // Access Admin
            'access-filament',
            // Manage Users
            'view-any-user',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'restore-user',
            // Manage Roles
            'view-any-role',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'restore-role',
            // Manage Permissions
            'view-any-permission',
            'view-permission',
            'update-permission',
            // Activity Logs
            'view-any-activity-log',
            'view-activity-log',
            // Application Health
            'access-health-check',
            // Comment
            'view-any-comment',
            'view-comment',
            'create-comment',
            'update-comment',
            'delete-comment',
            'restore-comment',
            // Download Link
            'create-download-link',
            'update-download-link',
            'delete-download-link',
            'view-any-download-link',
            'view-download-link',
            // Live View
            'view-any-live-view',
            'view-live-view',
            'create-live-view',
            'update-live-view',
            'delete-live-view',
            'restore-live-view',
            'force-delete-live-view',
            // Upgrade
            'free-short-link',
            'free-ads',
        ]);

        User::find(1)->syncRoles('super-admin');
        User::find(2)->syncRoles('admin');
        User::find(3)->syncRoles('moderator');
    }
}
