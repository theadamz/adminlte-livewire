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
        Schema::create('access_template_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('access_template_id')->index();
            $table->string('code', 50)->index();
            $table->string('permission', 25)->comment('read,edit,delete,validation,etc');
            $table->boolean('is_allowed')->default(true);
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();

            // indexes
            $table->unique(['access_template_id', 'code', 'permission'], 'access_template_details_unique');
            $table->index(['access_template_id', 'code']);

            // FK
            $table->foreign('access_template_id')->references('id')->on('access_templates')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_template_details');
    }
};
