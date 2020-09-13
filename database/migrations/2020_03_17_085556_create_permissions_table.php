<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission',30)->unique();
            $table->integer('per_com_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('role_permissions', function(Blueprint $table)
        {
            $table->integer('role_id')->unsigned();
            $table->integer('permissions_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_permissions');
    }
}
