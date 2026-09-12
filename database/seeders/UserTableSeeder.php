<?php

namespace Database\Seeders;

use App\Models\BioModel;
use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{

    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ilemobayo Eliab',
            'email' => 'eliabsiji@gmail.com',
            'avatar' => 'unnamed.png',
            'password' => FacadesHash::make('12345678'),
            // 'wpassword' => '12345678',
        ]);

        BioModel::updateOrCreate(['user_id'=>$user->id],
                                 ['firstname' =>'ilemobayo',
                                   'lastname' => 'Eliab',
                                   'othernames' => 'siji',
                                   'phone' => '98385523567',
                                   'address' => 'ondo',
                                   'gender' =>'male',
                                   'maritalstatus' =>'Single',
                                    'nationality' =>'nigerian',
                                    'dob' => '12-12-12']);

        // $role = Role::find(1);
        $role = Role::create(['name' => 'Super Admin','badge'=>'badge bg-success']); //creating super admin role
        $role2 = Role::create(['name' => 'Admin','badge'=>'badge bg-primary']);//creating admin role
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        $role2->syncPermissions($permissions);
        $user->assignRole([$role2->id]);

    }
}
