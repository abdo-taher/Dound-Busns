<?php
namespace Database\Migrations\Club;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("club_id")->constrained()->cascadeOnDelete();
            $table->foreignId("user_id")->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_category_id')->constrained()->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('booking_date');
            $table->enum('status', ['pending', 'active', 'cancelled'])->default('pending');
            $table->uuid("code")->unique();
            $table->boolean('is_active')->default(true);
            $table->double('price', 20, 4)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
