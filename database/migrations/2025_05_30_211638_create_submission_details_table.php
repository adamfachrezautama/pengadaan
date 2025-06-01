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
        Schema::create('submission_details', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('submission_id');

            $table->foreign('submission_id')
                ->references('id')->on('submissions')->onDelete('cascade');

                $table->uuid('item_detail_id');
            $table->foreign('item_detail_id')
                ->references('id')->on('itemDetails')->onDelete('cascade');

                $table->uuid('user_id');
            $table->foreign('user_id')
            ->references('id')->on('usesr')->onDelete('cascade');

            $table->integer('qty')->default(0);
            $table->enum('unit',['unit','pcs','box']);
            $table->string('description')->nullable();

            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])
                ->default('pending');
            $table->text('submission_reason')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->uuid('approved_by')->nullable();
            $table->foreign('approved_by')
                ->references('id')->on('users')->nullOnDelete();
            $table->date('approval_date')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_details');
    }
};
