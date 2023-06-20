<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('truck_subunits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_truck_id');
            $table->unsignedBigInteger('subunit_truck_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->foreign('main_truck_id')->references('id')->on('trucks')->onDelete('cascade');
            $table->foreign('subunit_truck_id')->references('id')->on('trucks')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_subunits');
    }
};
