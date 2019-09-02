<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainDBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_academics', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('CASERP_ID',11);
            $table->primary('CASERP_ID');
            $table->decimal('SSC',6,3)->default(0);
            $table->decimal('HSC',6,3)->default(0);
            $table->decimal('Poly',6,3)->default(0);
            $table->decimal('FE_CGPA',4,2)->default(0);
            $table->decimal('SE_CGPA',4,2)->default(0);
            $table->decimal('TE_CGPA',4,2)->default(0);
            $table->decimal('FE_PERCENT',6,3)->default(0);
            $table->decimal('SE_PERCENT',6,3)->default(0);
            $table->decimal('TE_PERCENT',6,3)->default(0);
            $table->integer('Overall_Gap')->lenght(2)->default(0);
            
            $table->timestamps();
        });


        Schema::create('Branch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Branch',80)->default('Null');
            $table->string('Class',8)->default('Null');
            $table->timestamps();
        });

        Schema::create('Login_Details', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('Email',255);
            $table->primary('Email');
            $table->string('password',50)->default('root');
            $table->string('user_type',20)->default('student');
            $table->timestamps();
        });

        Schema::create('Placement_Details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CASERP_ID',11);
            $table->foreign('CASERP_ID')->references('CASERP_ID')->on('student_academics');
            $table->string('Placement_Status',40)->default('Not Placed');
            $table->string('Company_Name',80)->default('Null');
            $table->string('Package',30)->default('0');
            $table->timestamps();
        });

        Schema::create('student_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Email',255)->default('Null');
            $table->foreign('Email')->references('Email')->on('Login_Details');
            $table->string('First_Name',30)->default('Anonymous');
            $table->string('Middle_Name',30)->default('Anonymous');
            $table->string('Last_Name',30)->default('Anonymous');
            $table->string('Class',8)->default('Null');
            $table->string('Branch',80)->default('Null');
            $table->integer('Passout_Year')->lenght(4)->default(2020);
            
            $table->timestamps();
        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_d_b_s');
    }
}
