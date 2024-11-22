<?php

use Imhotep\Facades\Scheme;
use Imhotep\Database\Migrations\Migration;
use Imhotep\Database\Schema\Table;

return new class extends Migration
{
     /**
     * Up the migration.
     *
     * @return void
     */
    public function up(): void
    {
        Scheme::create('users', function (Table $table) {
            $table->id();
            $table->string('login', 60);
            $table->string('password', 64);
            $table->timestamps();
        });
    }

    /**
     * Down the migration.
     *
     * @return void
     */
    public function down(): void
    {
        Scheme::dropIfExists('users');
    }
};