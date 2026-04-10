<?php
namespace Database\Migrations\Admin;
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
        Schema::create('admin_to_vendor_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('vendor_id');
            $table->double('amount', 20, 4);
            $table->string('currency')->default("SAR");
            $table->timestamps();

            // Foreign keys
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('clubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_to_vendor_payments');
    }
};
