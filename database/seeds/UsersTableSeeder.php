<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // permisos
        Permission::firstOrCreate(['name' => 'G. Usuarios']);
        Permission::firstOrCreate(['name' => 'G. Productos']);
        Permission::firstOrCreate(['name' => 'G. Ventas']);

        // roles
        $role = Role::firstOrCreate(['name' => 'Administrador']);
        Role::firstOrCreate(['name' => 'Cliente']);
        Role::firstOrCreate(['name' => 'Vendedor']);
        $role->givePermissionTo(Permission::all());



        $user= User::firstOrCreate([
            'name' => 'Joselo',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('12345678'),
            'nombres'=>'Jose Eduardo',
            'apellidos'=>'Chanchicocha Jati',
            'identificacion'=>'1234567890',
            'telefono'=>'123456789',
            'direccion'=>'SALCEDO',
        ]);


        $consumidor= User::firstOrCreate([
            'name' => 'Consumidor Final',
            'email' => 'consumidor_final@gmail.com',
            'password' => Hash::make('consumidor_final@_2020'),
            'nombres'=>'Final',
            'apellidos'=>'Consumidor',
            'identificacion'=>'0000000000',
            'telefono'=>'123456789',
            'direccion'=>'SALCEDO',
        ]);


        $user->assignRole($role);
    }
}
