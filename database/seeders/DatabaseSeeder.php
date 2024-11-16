<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permissions;
use App\Models\Roles;
use App\Models\Statuts;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([ 
            'id' => '1',
            'fullname' => 'DIGIWEB Admin',
            'email' => 'tech@digiweb.bj', 
            'password' => bcrypt('Dig1M@c20'),
            'nom' => 'DIGIWEB',
            'prenoms' => 'Admin',
            'telephone' => '90 00 00 00',
            //'role_id' => '1',
            'enable' => 1
        ]);
        //Ajout des statuts
        Statuts::create([ 
            'libelle' => 'ACTIF',
            'description' => 'Actif',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Statuts::create([ 
            'libelle' => 'INACTIF',
            'description' => 'Inactif',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        //Ajout des roles
        Roles::create([ 
            'libelle' => 'ADMIN',
            'description' => 'Administrateur',
        ]);
        Roles::create([ 
            'libelle' => 'USER',
            'description' => 'Rôle utilisateur', 
        ]);
        Roles::create([ 
            'libelle' => 'MEDIA',
            'description' => 'Rôle pour les médias', 
        ]);
        Roles::create([ 
            'libelle' => 'CLIENT',
            'description' => 'Rôle pour les clients y compris les abonnés',
        ]);
        
        //Ajout permissions
        Permissions::create([ 
            'role_id' => '1',
            'created' => '1', 
            'readed' => '1', 
            'updated' => '1', 
            'deleted' => '1', 
            'moved' => "1", 
            'statut_id' => "1",
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Permissions::create([ 
            'role_id' => '2',
            'created' => '1', 
            'readed' => '1', 
            'updated' => '1', 
            'statut_id' => "1",
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Permissions::create([ 
            'role_id' => '3',
            'created' => '1', 
            'readed' => '1', 
            'statut_id' => "1",
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Permissions::create([ 
            'role_id' => '4',
            'readed' => '1', 
            'statut_id' => "1",
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        $user = User::find(1);
        $user->setAttribute("role_id", 1);
        $user->update();
    }
}
