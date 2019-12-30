<?php
use App\Admin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->boolean('super')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        $first=[
            "email"=>"dhiaaback@gmail.com",
            "password"=>"0000",
            "name"=>"admin",
            "super"=>true

        ];
        admin::create($first);

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
