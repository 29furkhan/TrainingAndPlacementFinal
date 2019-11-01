<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainDBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voID
     */
    public function up()
    {
        
        Schema::create('Department',function(Blueprint $table){
            $table->string('Dept_ID',20);
            $table->primary('Dept_ID');
            $table->string('Dept_Name',40); 
        });

        Schema::create('Authority',function(Blueprint $table){
            $table->string('Auth_ID',20);
            $table->primary('Auth_ID');
            $table->string('Dept_ID',20)->default('Null');
            $table->foreign('Dept_ID')->references('Dept_ID')->on('Department');
            $table->string('Auth_Name',40)->default('Anonymous');
            $table->string('Auth_Department',40)->default('Null');
            $table->string('Designation')->default('Null');
        });

        Schema::create('Notices', function (Blueprint $table) {
            $table->string('Notice_ID',20);
            $table->primary('Notice_ID');
            $table->string('Auth_ID',20)->default('Null');
            $table->foreign('Auth_ID')->references('Auth_ID')->on('Authority');
            $table->string('Notice_Subject')->default('BLANK');
            $table->string('Notice_Content',800)->default('BLANK');
            $table->timestamps();
        });

        Schema::create('Activities', function (Blueprint $table) {
            $table->string('Activity_ID',20);
            $table->primary('Activity_ID');
            $table->string('Activity_Name')->default('BLANK');
            $table->string('Activity_Description',800)->default('BLANK');
            $table->integer('Activity_Fee')->default(0);
            $table->timestamps();
        });

        Schema::create('Login_Details', function (Blueprint $table) {
            // $table->bigIncrements('ID');
            $table->string('Email',180);
            $table->primary('Email');
            $table->string('password')->default('root');
            $table->string('user_type',20)->default('student');
            $table->timestamps();
        });


        Schema::create('student_academics', function (Blueprint $table) {
            $table->string('Email',180)->default('Null');
            $table->foreign('Email')->references('Email')->on('Login_Details');
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
            $table->bigIncrements('ID');
            $table->string('Branch',80)->default('Null');
            $table->string('Class',8)->default('Null');
            $table->timestamps();
        });

        Schema::create('Placement_Details', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('Email',180)->default('Null');
            $table->foreign('Email')->references('Email')->on('Login_Details');
            $table->string('Placement_Status',40)->default('Not Placed');
            $table->string('Company_Name',80)->default('Null');
            $table->string('Package',30)->default('0');
            $table->timestamps();
        });

        Schema::create('student_profile', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('Email',180)->default('Null');
            $table->foreign('Email')->references('Email')->on('Login_Details');
            $table->string('First_Name',30)->default('Anonymous');
            $table->string('MIDdle_Name',30)->default('Anonymous');
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
     * @return voID
     */
    public function down()
    {
        Schema::dropIfExists('main_d_b_s');
    }
}
