<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('type_project');
            $table->string('name_client');
            $table->string('project_name');
            $table->string('main_pic');
            $table->string('grid_pic');
            $table->longText('article');
            $table->string('location');
            $table->string('year');
            $table->string('status');
            $table->string('designer')->nullable();
            $table->string('energy_savings')->nullable();
            $table->string('water_savings')->nullable();
            $table->string('carbon_reduction')->nullable();
            $table->string('embodied_energy')->nullable();
            $table->string('basic_design')->nullable();
            $table->string('main_contractor')->nullable();
            $table->string('architecht_build')->nullable();
            $table->string('architecht')->nullable();
            $table->longText('sustainability_team')->nullable();
            $table->longText('team_arsitektur')->nullable();
            $table->string('struktur')->nullable();
            $table->string('mep')->nullable();
            $table->string('qs')->nullable();
            $table->longText('design_team')->nullable();
            $table->longText('collaborators')->nullable();
            $table->longText('fabrication_team')->nullable();
            $table->string('publication')->nullable();
            $table->string('pic1');
            $table->string('name_pic1')->nullable();
            $table->string('pic2');
            $table->string('name_pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->string('name_pic3')->nullable();
            $table->string('pic4')->nullable();
            $table->string('name_pic4')->nullable();
            $table->string('pic5')->nullable();
            $table->string('name_pic5')->nullable();
            $table->string('pic6')->nullable();
            $table->string('name_pic6')->nullable();
            $table->string('pic7')->nullable();
            $table->string('name_pic7')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
