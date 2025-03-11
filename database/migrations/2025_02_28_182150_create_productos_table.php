<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{

    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 10, 2);
        $table->string('imagen')->nullable();
        $table->string('categoria');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Agrega esta línea
        $table->timestamps();
    });
}
};
