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
        Scheme::create('blogs', function (Table $table) {
            $table->id();
            $table->int('user_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Down the migration.
     *
     * @return void
     */
    public function down(): void
    {
        Scheme::dropIfExists('blogs');
    }
};