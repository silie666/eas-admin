<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;

class Init extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (DB::table('students')->count() > 0) {
            $this->error('Database has been initialized');
            return;
        }
        DB::table('admin_menu')->insert([
            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => 'Person',
                'icon'      => 'fa-align-justify',
                'uri'       => '',
            ],
            [
                'parent_id' => 8,
                'order'     => 9,
                'title'     => 'Teachers',
                'icon'      => 'fa-users',
                'uri'       => 'person/teachers',
            ],
            [
                'parent_id' => 8,
                'order'     => 10,
                'title'     => 'Students',
                'icon'      => 'fa-users',
                'uri'       => 'person/students',
            ],
        ]);

        DB::table('admin_permissions')->insert([
            [
                'name'        => 'Student management',
                'slug'        => 'student.management',
                'http_method' => '',
                'http_path'   => '/person/students*',
            ],
            [
                'name'        => 'Teacher management',
                'slug'        => 'teacher.management',
                'http_method' => '',
                'http_path'   => '/person/teachers*',
            ],
        ]);

        DB::table('admin_role_menu')->insert([
            [
                'role_id' => 1,
                'menu_id' => 9,
            ],
            [
                'role_id' => 1,
                'menu_id' => 8,
            ],
            [
                'role_id' => 2,
                'menu_id' => 8,
            ],
        ]);
        DB::table('admin_role_permissions')->insert([
            [
                'role_id'       => 2,
                'permission_id' => 2,
            ],
            [
                'role_id'       => 2,
                'permission_id' => 3,
            ],
            [
                'role_id'       => 2,
                'permission_id' => 4,
            ],
            [
                'role_id'       => 2,
                'permission_id' => 6,
            ],
        ]);
        DB::table('admin_role_users')->insert(
            [
                'role_id' => 2,
                'user_id' => 2,
            ]
        );
        DB::table('admin_roles')->insert([
            'name' => 'Teacher',
            'slug' => 'teacher',
        ]);
        DB::table('admin_users')->insert([
            'username'       => 'teacher',
            'password'       => '$2y$10$KtLyoUoxVdxqUw6JyKQm5OKaVAK30YheJ49YBU803S5f8D2tjNe0G',
            'name'           => 'wang',
            'remember_token' => 'rYvRAaNfY5aoh3kkA6mkyz20AXUBujLFW61KlstM0fYdm3rxmWF7H3E9Qi4X',
        ]);
        DB::table('students')->insert([
            'username' => 'yu',
            'name'     => 'yu',
            'password' => '$2y$10$XSTfuL0gaFsxKhptMkR0J.TChSKOs0XKxUcx6WaLfjusIsuvA2QWa',
        ]);
    }
}
