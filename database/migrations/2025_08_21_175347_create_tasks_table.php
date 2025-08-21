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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // otomatik artan ID
            $table->string('title'); // görev başlığı
            $table->text('description')->nullable(); // açıklama (opsiyonel)
            $table->boolean('is_completed')->default(false); // tamamlandı mı?
            $table->timestamps(); // oluşturulma ve güncellenme zamanı
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
