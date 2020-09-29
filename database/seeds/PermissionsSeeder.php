<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::findOrCreate('edit genders');
        Permission::findOrCreate('delete genders');
        Permission::findOrCreate('view gender');
        Permission::findOrCreate('viewAny genders');
        Permission::findOrCreate('create genders');

        Permission::findOrCreate('edit players');
        Permission::findOrCreate('delete players');
        Permission::findOrCreate('view player');
        Permission::findOrCreate('viewAny players');
        Permission::findOrCreate('create players');

        Permission::findOrCreate('edit addresses');
        Permission::findOrCreate('delete addresses');
        Permission::findOrCreate('view address');
        Permission::findOrCreate('viewAny addresses');
        Permission::findOrCreate('create addresses');

        Permission::findOrCreate('edit associates');
        Permission::findOrCreate('delete associates');
        Permission::findOrCreate('view associate');
        Permission::findOrCreate('viewAny associates');
        Permission::findOrCreate('create associates');

        Permission::findOrCreate('edit sports');
        Permission::findOrCreate('delete sports');
        Permission::findOrCreate('view sport');
        Permission::findOrCreate('viewAny sports');
        Permission::findOrCreate('create sports');

        Permission::findOrCreate('edit teams');
        Permission::findOrCreate('delete teams');
        Permission::findOrCreate('view team');
        Permission::findOrCreate('viewAny teams');
        Permission::findOrCreate('create teams');
        Permission::findOrCreate('join teams');
        Permission::findOrCreate('dismiss teams');

        Permission::findOrCreate('edit tournaments');
        Permission::findOrCreate('delete tournaments');
        Permission::findOrCreate('view tournament');
        Permission::findOrCreate('viewAny tournaments');
        Permission::findOrCreate('create tournaments');
        Permission::findOrCreate('join tournaments');
        Permission::findOrCreate('dismiss tournaments');

        Permission::findOrCreate('edit sports_courts');
        Permission::findOrCreate('delete sports_courts');
        Permission::findOrCreate('view sports_court');
        Permission::findOrCreate('viewAny sports_courts');
        Permission::findOrCreate('create sports_courts');

        Permission::findOrCreate('edit transactions');
        Permission::findOrCreate('delete transactions');
        Permission::findOrCreate('view transaction');
        Permission::findOrCreate('viewAny transactions');
        Permission::findOrCreate('create transactions');

        Permission::findOrCreate('edit matches');
        Permission::findOrCreate('delete matches');
        Permission::findOrCreate('view match');
        Permission::findOrCreate('viewAny matches');
        Permission::findOrCreate('create matches');

        Permission::findOrCreate('edit sports_court_prices');
        Permission::findOrCreate('delete sports_court_prices');
        Permission::findOrCreate('view sports_court_price');
        Permission::findOrCreate('viewAny sports_court_prices');
        Permission::findOrCreate('create sports_court_prices');

        Permission::findOrCreate('edit associate_galleries');
        Permission::findOrCreate('delete associate_galleries');
        Permission::findOrCreate('view associate_gallery');
        Permission::findOrCreate('viewAny associate_galleries');
        Permission::findOrCreate('create associate_galleries');

        // create roles and assign existing permissions
        $role1 = Role::findOrCreate('player');
        $role1->givePermissionTo('edit players');
        $role1->givePermissionTo('view player');
        $role1->givePermissionTo('edit addresses');
        $role1->givePermissionTo('delete addresses');
        $role1->givePermissionTo('view address');
        $role1->givePermissionTo('viewAny addresses');
        $role1->givePermissionTo('create addresses');
        $role1->givePermissionTo('edit teams');
        $role1->givePermissionTo('delete teams');
        $role1->givePermissionTo('view team');
        $role1->givePermissionTo('viewAny teams');
        $role1->givePermissionTo('create teams');
        $role1->givePermissionTo('join teams');
        $role1->givePermissionTo('dismiss teams');
        $role1->givePermissionTo('edit transactions');
        $role1->givePermissionTo('delete transactions');
        $role1->givePermissionTo('view transaction');
        $role1->givePermissionTo('viewAny transactions');
        $role1->givePermissionTo('create transactions');
        $role1->givePermissionTo('edit tournaments');
        $role1->givePermissionTo('delete tournaments');
        $role1->givePermissionTo('view tournament');
        $role1->givePermissionTo('viewAny tournaments');
        $role1->givePermissionTo('create tournaments');
        $role1->givePermissionTo('join tournaments');
        $role1->givePermissionTo('dismiss tournaments');
        $role1->givePermissionTo('edit matches');
        $role1->givePermissionTo('delete matches');
        $role1->givePermissionTo('view match');
        $role1->givePermissionTo('viewAny matches');
        $role1->givePermissionTo('create matches');
        $role1->givePermissionTo('view associate_gallery');

        $role2 = Role::findOrCreate('associate');
        $role2->givePermissionTo('edit addresses');
        $role2->givePermissionTo('delete addresses');
        $role2->givePermissionTo('view address');
        $role2->givePermissionTo('viewAny addresses');
        $role2->givePermissionTo('create addresses');
        $role2->givePermissionTo('edit associate_galleries');
        $role2->givePermissionTo('delete associate_galleries');
        $role2->givePermissionTo('view associate_gallery');
        $role2->givePermissionTo('viewAny associate_galleries');
        $role2->givePermissionTo('create associate_galleries');
        $role2->givePermissionTo('edit sports_court_prices');
        $role2->givePermissionTo('delete sports_court_prices');
        $role2->givePermissionTo('view sports_court_price');
        $role2->givePermissionTo('viewAny sports_court_prices');
        $role2->givePermissionTo('create sports_court_prices');
        $role2->givePermissionTo('edit tournaments');
        $role2->givePermissionTo('delete tournaments');
        $role2->givePermissionTo('view tournament');
        $role2->givePermissionTo('viewAny tournaments');
        $role2->givePermissionTo('create tournaments');
        $role2->givePermissionTo('edit associates');
        $role2->givePermissionTo('delete associates');
        $role2->givePermissionTo('view associate');

        $role3 = Role::findOrCreate('super-admin');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // // create demo users
        // $user = Factory(App\User::class)->create([
        //     'name' => 'Player',
        //     'email' => 'player@mail.com',
        // ]);
        // $user->assignRole($role1);

        // $user = Factory(App\User::class)->create([
        //     'name' => 'Associate',
        //     'email' => 'associate@mail.com',
        // ]);
        // $user->assignRole($role2);

        $user = App\Models\User::firstOrCreate([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@mail.com',
            
        ],['password' => 'secret']);
        $user->syncRoles(['super-admin']);
    }
}