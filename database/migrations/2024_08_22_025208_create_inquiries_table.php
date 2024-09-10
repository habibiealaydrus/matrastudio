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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string("title_gender");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email_inquiry");
            $table->double("phone");
            $table->double("post_code");
            $table->string("company_name");
            $table->string("company_location");
            $table->string("type_project");
            $table->string("subject_inquiry");
            $table->string("message_inquiry");
            $table->string("project_file");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
