<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('bank_id');
            $table->string('branchName');
            $table->string('branchAddress');
            $table->integer('phone');
            $table->timestamps();
        });
        Schema::table('banks', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
