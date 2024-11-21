<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('arabic_name');
            $table->string('english_name');
            $table->string('composition')->nullable();
            $table->string('indication')->nullable();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('titer')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->timestamps();
        });

        Schema::create('medicine_alternative', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('alternative_id');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->foreign('alternative_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicine_alternative');
        Schema::dropIfExists('medicines');
    }
};
