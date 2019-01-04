<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30)->comment('用户名称');
            $table->string('nickname',30)->nullable()->comment('用户别名');
            $table->string('email',30)->nullable()->comment('邮箱');
            $table->char('password',64)->comment('密码');
            $table->enum('status',[0,1])->default(1)->comment('状态 0 禁用 1 启用');
            $table->string('phone',11)->comment('手机');
            $table->string('api_token',64)->comment('用户扩展信息，如登录token等');
            $table->softDeletes();
            $table->timestamps();
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
