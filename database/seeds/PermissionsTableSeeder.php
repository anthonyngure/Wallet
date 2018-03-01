<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 2,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 3,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 4,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 5,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 6,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 7,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 8,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 9,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 10,
                'key' => 'browse_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 11,
                'key' => 'read_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 12,
                'key' => 'edit_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 13,
                'key' => 'add_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 14,
                'key' => 'delete_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-16 20:46:05',
                'updated_at' => '2018-02-16 20:46:05',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 15,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 16,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 17,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 18,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 19,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 20,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 21,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 22,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 23,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 24,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 25,
                'key' => 'browse_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 26,
                'key' => 'read_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 27,
                'key' => 'edit_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 28,
                'key' => 'add_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 29,
                'key' => 'delete_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 30,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 31,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 32,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 33,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 34,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 35,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 36,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 37,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-16 20:46:06',
                'updated_at' => '2018-02-16 20:46:06',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 38,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-16 20:46:07',
                'updated_at' => '2018-02-16 20:46:07',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 39,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-16 20:46:07',
                'updated_at' => '2018-02-16 20:46:07',
                'permission_group_id' => NULL,
            ),
            
            array (
                'id' => 40,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2018-02-16 20:46:11',
                'updated_at' => '2018-02-16 20:46:11',
                'permission_group_id' => NULL,
            ),
        ));
        
        
    }
}