<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rule_name',20)->comment('接口名称');
            $table->string('rule',20)->comment('接口地址');
            $table->enum('status',[1,0])->comment('状态 0 禁用 1，启用');
            $table->softDeletes();
            $table->timestamps();
            $table->index('status');
            $table->unique('rule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
