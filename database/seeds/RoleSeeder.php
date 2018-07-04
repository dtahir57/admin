<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['View_Permission', 'Add_Permission', 'Edit_Permission', 'Delete_Permission', 'View_Role', 'Add_Role', 'Edit_Role', 'Delete_Role', 'View_User_Type', 'Add_User_Type', 'Edit_User_Type', 'Delete_User_Type', 'View_Company_Type', 'Add_Company_Type', 'Edit_Company_Type', 'Delete_Company_Type', 'View_Company', 'Add_Company', 'Edit_Company', 'Delete_Company', 'View_Event', 'Add_Event', 'Edit_Event', 'Delete_Event', 'View_Event_Place', 'Add_Event_Place', 'Edit_Event_Place', 'Delete_Event_Place', 'View_Project', 'Add_Project', 'Edit_Project', 'Delete_Project', 'View_Project_Unit', 'Add_Project_Unit', 'Edit_Project_Unit', 'Get_Project_Unit', 'Delete_Project_Unit', 'View_News', 'Add_News', 'Edit_News', 'Delete_News', 'View_City', 'Add_City', 'Edit_City', 'Delete_City', 'View_Project_Type', 'Add_Project_Type', 'Edit_Project_Type', 'Delete_Project_Type']);

        $register_site = Role::create(['name' => 'Register_Site']);
        $register_site->givePermissionTo(['View_Permission', 'Add_Permission', 'Edit_Permission', 'Delete_Permission', 'View_Role', 'Add_Role', 'Edit_Role', 'Delete_Role', 'View_User_Type', 'Add_User_Type', 'Edit_User_Type', 'Delete_User_Type', 'View_Company_Type', 'Add_Company_Type', 'Edit_Company_Type', 'Delete_Company_Type', 'View_Company', 'Add_Company', 'Edit_Company', 'Delete_Company', 'View_Event', 'Add_Event', 'Edit_Event', 'Delete_Event', 'View_Event_Place', 'Add_Event_Place', 'View_Project', 'Add_Project', 'Edit_Project', 'Delete_Project', 'Edit_Event_Place', 'Delete_Event_Place', 'View_Project_Unit', 'Add_Project_Unit', 'Edit_Project_Unit', 'Get_Project_Unit', 'Delete_Project_Unit', 'View_News', 'Add_News', 'Edit_News', 'Delete_News', 'View_City', 'Add_City', 'Edit_City', 'Delete_City', 'View_Project_Type', 'Add_Project_Type', 'Edit_Project_Type', 'Delete_Project_Type']);

        $developer_user = Role::create(['name' => 'Developer_User']);
        $developer_user->givePermissionTo(['View_Permission', 'Add_Permission', 'Edit_Permission', 'Delete_Permission', 'View_Role', 'Add_Role', 'Edit_Role', 'Delete_Role', 'View_User_Type', 'Add_User_Type', 'Edit_User_Type', 'Delete_User_Type', 'View_Company_Type', 'Add_Company_Type', 'Edit_Company_Type', 'Delete_Company_Type', 'View_Company', 'Add_Company', 'Edit_Company', 'Delete_Company', 'View_Event', 'Add_Event', 'Edit_Event', 'Delete_Event', 'View_Event_Place', 'Add_Event_Place', 'Edit_Event_Place', 'Delete_Event_Place', 'View_Project', 'Add_Project', 'Edit_Project', 'Delete_Project', 'View_Project_Unit', 'Add_Project_Unit', 'Edit_Project_Unit', 'Get_Project_Unit', 'Delete_Project_Unit', 'View_News', 'Add_News', 'Edit_News', 'Delete_News', 'View_City', 'Add_City', 'Edit_City', 'Delete_City', 'View_Project_Type', 'Add_Project_Type', 'Edit_Project_Type', 'Delete_Project_Type']);

        $venue_user = Role::create(['name' => 'Venue_User']);
         $venue_user->givePermissionTo(['View_Permission', 'Add_Permission', 'Edit_Permission', 'Delete_Permission', 'View_Role', 'Add_Role', 'Edit_Role', 'Delete_Role', 'View_User_Type', 'Add_User_Type', 'Edit_User_Type', 'Delete_User_Type', 'View_Company_Type', 'Add_Company_Type', 'Edit_Company_Type', 'Delete_Company_Type', 'View_Company', 'Add_Company', 'Edit_Company', 'Delete_Company', 'View_Event', 'Add_Event', 'Edit_Event', 'Delete_Event', 'View_Event_Place', 'Add_Event_Place', 'Edit_Event_Place', 'Delete_Event_Place', 'View_Project', 'Add_Project', 'Edit_Project', 'Delete_Project', 'View_Project_Unit', 'Add_Project_Unit', 'Edit_Project_Unit', 'Get_Project_Unit', 'Delete_Project_Unit', 'View_News', 'Add_News', 'Edit_News', 'Delete_News', 'View_City', 'Add_City', 'Edit_City', 'Delete_City', 'View_Project_Type', 'Add_Project_Type', 'Edit_Project_Type', 'Delete_Project_Type']);
    }
}
