<?php

// database/migrations/[timestamp]_create_salary_records_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('salary_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->string('salary_month');
            $table->decimal('net_pay', 10, 2);
            $table->decimal('wages', 10, 2)->default(0);
            $table->decimal('basic', 10, 2);
            $table->decimal('hra', 10, 2)->default(0);
            $table->decimal('gross', 10, 2);
            $table->decimal('pf', 10, 2)->default(0);
            $table->decimal('esi', 10, 2)->default(0);
            $table->decimal('advance', 10, 2)->default(0);
            $table->decimal('uniform', 10, 2)->default(0);
            $table->decimal('fine', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_records');
    }
};