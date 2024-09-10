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
            $table->string('logo_client')->nullable();
            $table->string('project_name');
            $table->string('main_pic');
            $table->longText('article');
            $table->string('pic1');
            $table->string('pic2');
            $table->string('pic3')->nullable();
            $table->string('pic4')->nullable();
            $table->string('pic5')->nullable();
            $table->string('pic6')->nullable();

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
