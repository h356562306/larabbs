<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //需要清除缓存，否则会报错
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        //创建角色
        \Spatie\Permission\Models\Permission::create(['name'=>'manage_contents']);
        \Spatie\Permission\Models\Permission::create(['name'=>'manage_user']);
        \Spatie\Permission\Models\Permission::create(['name'=>'edit_setting']);
        //创建站长角色，并且赋予权限
        $founder = \Spatie\Permission\Models\Role::create(['name'=>'Founder']);
        $founder->givePermissionTo("manage_contents");
        $founder->givePermissionTo("manage_user");
        $founder->givePermissionTo("edit_setting");
        //创建管理员角色，并且赋予权限
        $maintainer = \Spatie\Permission\Models\Role::create(['name'=>'Maintainer']);
        $maintainer->givePermissionTo('manage_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $tableNames = config("permission.table_names");
        \App\Models\Model::unguard();
        \Illuminate\Support\Facades\DB::table($tableNames['role_has_permissions'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['model_has_roles'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['model_has_permissions'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['roles'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['permissions'])->delete();
        \App\Models\Model::reguard();
    }
}
