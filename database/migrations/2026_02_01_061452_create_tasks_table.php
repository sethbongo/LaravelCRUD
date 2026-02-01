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
            $table->id();
            $table->string('title');
            $table->longText('tasks');
            $table->date('date_to_do');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   
            $table->timestamps();
        });
    }

        protected $fillable = [
        'title',
        'tasks',
        'date_to_do',
        'user_id',
        
    ];

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
