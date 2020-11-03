<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->increments('mg_id')->comment('主键');  //主键
            $table->string('username', 64)->comment('名称'); // varchar(64)
            $table->char('password', 60)->comment('密码'); // char(64)
            $table->string('mg_role_ids')->nullable()->comment('角色ids');
            $table->enum('mg_sex', ['男', '女'])->default('男')->comment('性别'); //enum
            $table->char('mg_phone', 11)->nullable()->comment('手机号码');
            $table->string('mg_email', 64)->nullable()->comment('邮箱');
            $table->text('mg_remark')->nullable()->comment('备注'); //text
            $table->timestamps();       // 生成created_at和update_at列
            $table->softDeletes();      // 软删除 deleted_at列
            $table->rememberToken();
            $table->unique('username');  // 唯一索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
