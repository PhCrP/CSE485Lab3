<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompletedColumnInTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Thay đổi cột 'completed' thành kiểu BOOLEAN với giá trị mặc định là FALSE
            $table->boolean('completed')->default(false)->change();
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Quay lại kiểu dữ liệu cũ (giả sử là TINYINT hoặc INTEGER)
            $table->tinyInteger('completed')->default(0)->change();
        });
    }
};
