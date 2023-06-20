<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_costs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('project_id');
            $table->foreignId('currency_id');
            $table->decimal('cost', 10, 2);

            $table->foreign('project_id')->on('projects')->references('id')->cascadeOnDelete();
            $table->foreign('currency_id')->on('currencies')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('project_costs');
    }
};
