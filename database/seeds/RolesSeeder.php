<?php

use App\Models\Role;
use App\Models\UserTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{

    private $roles;

    const ADMIN_ROLES = [
        'shipments' => 4,
        'clients'   => 4,
        'couriers'  => 4,
        'pickups'   => 4,
        'notes'     => 4,
        'zones'     => 4,
        'services'  => 4,
        'users'     => 4,
        'roles'     => 4,
        'mailing'   => 4,
        'reporting' => 4,
        'documents' => 4,
        'settings'  => 4,
        'logs'      => 4,
    ];

    const DEFAULT_ROLES = [
        'shipments' => 3,
        'clients'   => 1,
        'couriers'  => 1,
        'pickups'   => 1,
        'notes'     => 4,
        'zones'     => 0,
        'services'  => 0,
        'users'     => 0,
        'roles'     => 0,
        'mailing'   => 0,
        'reporting' => 0,
        'documents' => 0,
        'settings'  => 0,
        'logs'      => 0,
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        UserTemplate::truncate();
        DB::table('role_user_template')->truncate();

        $this->createRoles();

        $this->createTemplates();
    }

    public function createRoles()
    {
        $this->roles = [
            'shipments' => Role::create(['name' => 'shipments', 'default' => 1])->id,
            'clients'   => Role::create(['name' => 'clients', 'default' => 1])->id,
            'couriers'  => Role::create(['name' => 'couriers', 'default' => 0])->id,
            'pickups'   => Role::create(['name' => 'pickups', 'default' => 0])->id,
            'notes'     => Role::create(['name' => 'notes', 'default' => 3])->id,
            'zones'     => Role::create(['name' => 'zones', 'default' => 0])->id,
            'services'  => Role::create(['name' => 'services', 'default' => 0])->id,
            'users'     => Role::create(['name' => 'users', 'default' => 0])->id,
            'roles'     => Role::create(['name' => 'roles', 'default' => 0])->id,
            'mailing'   => Role::create(['name' => 'mailing', 'default' => 1])->id,
            'reporting' => Role::create(['name' => 'reporting', 'default' => 0])->id,
            'documents' => Role::create(['name' => 'documents', 'default' => 0])->id,
            'settings'  => Role::create(['name' => 'settings', 'default' => 3])->id,
            'logs'      => Role::create(['name' => 'logs', 'default' => 2])->id,
        ];
    }

    public function createTemplates()
    {
        $out = [];

        $out['admin'] = $this->createTemplate([
            'name'        => "admin",
            'description' => "Administrator",
            'default'     => false,
            'editable'    => false,
            'deletable'   => false,
        ], self::ADMIN_ROLES);

        $out['employee'] = $this->createTemplate([
            'name'        => "employee",
            'description' => "Employee",
            'default'     => true,
            'editable'    => true,
            'deletable'   => false,
        ], self::DEFAULT_ROLES);

        $out['client'] = $this->createTemplate([
            'name'        => "client",
            'description' => "Client",
            'default'     => false,
            'editable'    => true,
            'deletable'   => false,
        ], self::DEFAULT_ROLES);

        $out['courier'] = $this->createTemplate([
            'name'        => "courier",
            'description' => "Courier",
            'default'     => false,
            'editable'    => true,
            'deletable'   => false,
        ], self::DEFAULT_ROLES);
        return $out;
    }


    /**
     * @param array $attributes
     * @param array $roles
     * @return UserTemplate
     */
    public function createTemplate($attributes, $roles)
    {
        /** @var UserTemplate $adminTemplate */
        $adminTemplate = UserTemplate::create($attributes);
        $adminTemplate->roles()->attach([
            $this->roles['shipments'] => ['value' => $roles['shipments']],
            $this->roles['clients']   => ['value' => $roles['clients']],
            $this->roles['couriers']  => ['value' => $roles['couriers']],
            $this->roles['pickups']   => ['value' => $roles['pickups']],
            $this->roles['notes']     => ['value' => $roles['notes']],
            $this->roles['zones']     => ['value' => $roles['zones']],
            $this->roles['services']  => ['value' => $roles['services']],
            $this->roles['users']     => ['value' => $roles['users']],
            $this->roles['roles']     => ['value' => $roles['roles']],
            $this->roles['mailing']   => ['value' => $roles['mailing']],
            $this->roles['reporting'] => ['value' => $roles['reporting']],
            $this->roles['documents'] => ['value' => $roles['documents']],
            $this->roles['settings']  => ['value' => $roles['settings']],
            $this->roles['logs']      => ['value' => $roles['logs']],
        ]);
        return $adminTemplate;
    }
}
