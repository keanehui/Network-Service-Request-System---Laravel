<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_requests', function (Blueprint $table) {
            $table->id();
            $table->string('requestor');
            $table->string('email');
            $table->string('category');
            $table->string('status')->default('pending');
            $table->string('progress')->default('queuing');
            $table->string('remark')->default('No remark');
            $table->timestamps();
            $table->string('c1a1')->nullable();
            $table->string('c1a2')->nullable();
            $table->string('c1a3')->nullable();
            $table->string('c2a1')->nullable();
            $table->string('c2a2')->nullable();
            $table->string('c2a3')->nullable();
            $table->string('c3a1')->nullable();
            $table->string('c3a2')->nullable();
            $table->string('c3a3')->nullable();
            $table->string('c4a1')->nullable();
            $table->string('c4a2')->nullable();
            $table->string('c4a3')->nullable();
            $table->string('c5a1')->nullable();
            $table->string('c5a2')->nullable();
            $table->string('c5a3')->nullable();
            $table->string('c0a1')->nullable();
            $table->string('c0a2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_requests');
    }
}
