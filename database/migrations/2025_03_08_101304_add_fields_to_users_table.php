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
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol', 7)->after('email')->default('guest'); // Rol con tamaño 7
            $table->string('surname')->after('name'); // Apellido
            $table->timestamp('birth_date')->nullable()->after('surname'); // Fecha de nacimiento
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['rol', 'surname', 'birth_date']);
        });
    }
};
