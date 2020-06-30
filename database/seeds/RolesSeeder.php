<?php
use Illuminate\Database\Seeder;
use \App\Role;
class RolesSeeder extends Seeder
{
    public function run()
    {
        $author = Role::create([
            'name' => 'Автор',
            'slug' => 'author',
            'permissions' => [
                'create-article' => true,
            ]
        ]);
        $editor = Role::create([
            'name' => 'Редактор',
            'slug' => 'editor',
            'permissions' => [
                'update-article' => true,
                'publish-article' => true,
            ]
        ]);
        $consists_of_UMO = Role::create([
            'name' => 'Член_УМО',
            'slug' => 'consists_of_UMO',
            'permissions' => []
        ]);
        $consists_of_editorial_board = Role::create([
            'name' => 'Член_редколегии',
            'slug' => 'consists_of_editorial_board',
            'permissions' => []
        ]);
        $glavRed = Role::create([
            'name' => 'Главный_редактор',
            'slug' => 'glavRed',
            'permissions' => []
        ]);
        $zamGlavRed = Role::create([
            'name' => 'Зам_главного_редактора',
            'slug' => 'zamGlavRed',
            'permissions' => []
        ]);
        $otvetRed = Role::create([
            'name' => 'Ответственный_редактор',
            'slug' => 'otvetRed',
            'permissions' => []
        ]);
        $is_admin = Role::create([
            'name' => 'Админ',
            'slug' => 'is_admin',
            'permissions' => []
        ]);
    }
}
