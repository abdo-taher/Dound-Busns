<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('type_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->double('price', 20, 4)->default(0);
            $table->string('size', 255)->nullable();
            $table->string('grass_type')->nullable();
            $table->string('img');
            $table->enum('type', ['Male', 'Female', 'Max']);
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('type_categories');
    }
}
