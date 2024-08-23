<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'create: user']);
        $userPermission2 = Permission::create(['name' => 'read: user']);
        $userPermission3 = Permission::create(['name' => 'update: user']);
        $userPermission4 = Permission::create(['name' => 'delete: user']);

        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'create: role']);
        $rolePermission2 = Permission::create(['name' => 'read: role']);
        $rolePermission3 = Permission::create(['name' => 'update: role']);
        $rolePermission4 = Permission::create(['name' => 'delete: role']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'create: permission']);
        $permission2 = Permission::create(['name' => 'read: permission']);
        $permission3 = Permission::create(['name' => 'update: permission']);
        $permission4 = Permission::create(['name' => 'delete: permission']);

        // TENANT MODEL
        $tenantPermission1 = Permission::create(['name' => 'create: tenant']);
        $tenantPermission2 = Permission::create(['name' => 'read: tenant']);
        $tenantPermission3 = Permission::create(['name' => 'update: tenant']);
        $tenantPermission4 = Permission::create(['name' => 'delete: tenant']);

        // AMENITY MODEL
        $amenityPermission1 = Permission::create(['name' => 'create: amenity']);
        $amenityPermission2 = Permission::create(['name' => 'read: amenity']);
        $amenityPermission3 = Permission::create(['name' => 'update: amenity']);
        $amenityPermission4 = Permission::create(['name' => 'delete: amenity']);

        // Apartment MODEL
        $apartmentPermission1 = Permission::create(['name' => 'create: apartment']);
        $apartmentPermission2 = Permission::create(['name' => 'read: apartment']);
        $apartmentPermission3 = Permission::create(['name' => 'update: apartment']);
        $apartmentPermission4 = Permission::create(['name' => 'delete: apartment']);

        // Apartmen block MODEL
        $apartmentBlockPermission1 = Permission::create(['name' => 'create: apartment_block']);
        $apartmentBlockPermission2 = Permission::create(['name' => 'read: apartment_block']);
        $apartmentBlockPermission3 = Permission::create(['name' => 'update: apartment_block']);
        $apartmentBlockPermission4 = Permission::create(['name' => 'delete: apartment_block']);

        // Apartment amenity MODEL
        $apartmentAmenityPermission1 = Permission::create(['name' => 'create: apartment_amenity']);
        $apartmentAmenityPermission2 = Permission::create(['name' => 'read: apartment_amenity']);
        $apartmentAmenityPermission3 = Permission::create(['name' => 'update: apartment_amenity']);
        $apartmentAmenityPermission4 = Permission::create(['name' => 'delete: apartment_amenity']);

        // Payment MODEL
        $paymentPermission1 = Permission::create(['name' => 'create: payment']);
        $paymentPermission2 = Permission::create(['name' => 'read: payment']);
        $paymentPermission3 = Permission::create(['name' => 'update: payment']);
        $paymentPermission4 = Permission::create(['name' => 'delete: payment']);

        // Maintenance Requests MODEL
        $maintenanceRequestPermission1 = Permission::create(['name' => 'create: maintenance_request']);
        $maintenanceRequestPermission2 = Permission::create(['name' => 'read: maintenance_request']);
        $maintenanceRequestPermission3 = Permission::create(['name' => 'update: maintenance_request']);
        $maintenanceRequestPermission4 = Permission::create(['name' => 'delete: maintenance_request']);

        // Owner MODEL
        $ownerPermission1 = Permission::create(['name' => 'create: owner']);
        $ownerPermission2 = Permission::create(['name' => 'read: owner']);
        $ownerPermission3 = Permission::create(['name' => 'update: owner']);
        $ownerPermission4 = Permission::create(['name' => 'delete: owner']);


        // ADMINS
        $adminPermission1 = Permission::create(['name' => 'read: admin']);
        $adminPermission2 = Permission::create(['name' => 'update: admin']);

        // CREATE ROLES
        $userRole = Role::create(['name' => 'tenant'])->syncPermissions([
            $miscPermission,
        ]);

        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $userPermission1,
            $maintenanceRequestPermission1,
            $maintenanceRequestPermission2,
            $maintenanceRequestPermission3,
            $maintenanceRequestPermission4,
            $paymentPermission1,
            $paymentPermission2,
            $paymentPermission3,
            $paymentPermission4,
            $ownerPermission1,
            $ownerPermission2,
            $ownerPermission3,
            $ownerPermission4,
            $apartmentBlockPermission1,
            $apartmentBlockPermission2,
            $apartmentBlockPermission3,
            $apartmentBlockPermission4,
            $apartmentAmenityPermission1,
            $apartmentAmenityPermission2,
            $apartmentAmenityPermission3,
            $apartmentAmenityPermission4,
            $tenantPermission1,
            $tenantPermission2,
            $tenantPermission3,
            $tenantPermission4,
            $amenityPermission1,
            $amenityPermission2,
            $amenityPermission3,
            $amenityPermission4,
            $apartmentPermission1,
            $apartmentPermission2,
            $apartmentPermission3,
            $apartmentPermission4,
            $ownerPermission1,
            $ownerPermission2,
            $ownerPermission3,
            $ownerPermission4,
        ]);
        $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $userPermission1,
        ]);
        $ownerRole = Role::create(['name' => 'owner'])->syncPermissions([
            $userPermission2,
            $rolePermission2,
            $permission2,
            //$adminPermission1,
        ]);
        // $tenantRole = Role::create(['name' => 'developer'])->syncPermissions([
        //     //$adminPermission1,
        // ]);

        // CREATE ADMINS & USERS
        User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);

        User::create([
            'name' => 'owner',
            'is_admin' => 1,
            'email' => 'owner@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($ownerRole);

        // User::create([
        //     'name' => 'developer',
        //     'is_admin' => 1,
        //     'email' => 'developer@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ])->assignRole($developerRole);

        for ($i = 1; $i < 50; $i++) {
            User::create([
                'name' => 'Test ' . $i,
                'is_admin' => 0,
                'email' => 'test' . $i . '@test.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'remember_token' => Str::random(10),
            ])->assignRole($userRole);
        }

    }
}
