<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['module' => 'permission', 'name' => 'View_Permission']);
        Permission::create(['module' => 'permission', 'name' => 'Add_Permission']);
        Permission::create(['module' => 'permission', 'name' => 'Edit_Permission']);
        Permission::create(['module' => 'permission', 'name' => 'Delete_Permission']);

        Permission::create(['module' => 'role', 'name' => 'View_Role']);
        Permission::create(['module' => 'role', 'name' => 'Add_Role']);
        Permission::create(['module' => 'role', 'name' => 'Edit_Role']);
        Permission::create(['module' => 'role', 'name' => 'Delete_Role']);

        Permission::create(['module' => 'user_type', 'name' => 'View_User_Type']);
        Permission::create(['module' => 'user_type', 'name' => 'Add_User_Type']);
        Permission::create(['module' => 'user_type', 'name' => 'Edit_User_Type']);
        Permission::create(['module' => 'user_type', 'name' => 'Delete_User_Type']);

        Permission::create(['module' => 'company_type', 'name' => 'View_Company_Type']);
        Permission::create(['module' => 'company_type', 'name' => 'Add_Company_Type']);
        Permission::create(['module' => 'company_type', 'name' => 'Edit_Company_Type']);
        Permission::create(['module' => 'company_type', 'name' => 'Delete_Company_Type']);

        Permission::create(['module' => 'company', 'name' => 'View_Company']);
        Permission::create(['module' => 'company', 'name' => 'Add_Company']);
        Permission::create(['module' => 'company', 'name' => 'Edit_Company']);
        Permission::create(['module' => 'company', 'name' => 'Delete_Company']);

        Permission::create(['module' => 'event', 'name' => 'View_Event']);
        Permission::create(['module' => 'event', 'name' => 'Add_Event']);
        Permission::create(['module' => 'event', 'name' => 'Edit_Event']);
        Permission::create(['module' => 'event', 'name' => 'Delete_Event']);

        Permission::create(['module' => 'event_place', 'name' => 'View_Event_Place']);
        Permission::create(['module' => 'event_place', 'name' => 'Add_Event_Place']);
        Permission::create(['module' => 'event_place', 'name' => 'Edit_Event_Place']);
        Permission::create(['module' => 'event_place', 'name' => 'Delete_Event_Place']);

        Permission::create(['module' => 'project', 'name' => 'View_Project']);
        Permission::create(['module' => 'project', 'name' => 'Add_Project']);
        Permission::create(['module' => 'project', 'name' => 'Edit_Project']);
        Permission::create(['module' => 'project', 'name' => 'Delete_Project']);

        Permission::create(['module' => 'project_unit', 'name' => 'View_Project_Unit']);
        Permission::create(['module' => 'project_unit', 'name' => 'Add_Project_Unit']);
        Permission::create(['module' => 'project_unit', 'name' => 'Edit_Project_Unit']);
        Permission::create(['module' => 'project_unit', 'name' => 'Get_Project_Unit']);
        Permission::create(['module' => 'project_unit', 'name' => 'Delete_Project_Unit']);

        Permission::create(['module' => 'news', 'name' => 'View_News']);
        Permission::create(['module' => 'news', 'name' => 'Add_News']);
        Permission::create(['module' => 'news', 'name' => 'Edit_News']);
        Permission::create(['module' => 'news', 'name' => 'Delete_News']);

        Permission::create(['module' => 'city', 'name' => 'View_City']);
        Permission::create(['module' => 'city', 'name' => 'Add_City']);
        Permission::create(['module' => 'city', 'name' => 'Edit_City']);
        Permission::create(['module' => 'city', 'name' => 'Delete_City']);

        Permission::create(['module' => 'project_type', 'name' => 'View_Project_Type']);
        Permission::create(['module' => 'project_type', 'name' => 'Add_Project_Type']);
        Permission::create(['module' => 'project_type', 'name' => 'Edit_Project_Type']);
        Permission::create(['module' => 'project_type', 'name' => 'Delete_Project_Type']);

        Permission::create(['module' => 'calender', 'name' => 'View_Calender']);
    }
}
