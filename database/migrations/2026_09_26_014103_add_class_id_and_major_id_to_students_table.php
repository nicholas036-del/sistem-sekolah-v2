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
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'class_id')) {
                $table->foreignId('class_id')
                    ->after('user_id')
                    ->nullable()
                    ->constrained('classes');
            }

            if (!Schema::hasColumn('students', 'major_id')) {
                $table->foreignId('major_id')
                    ->after('class_id')
                    ->nullable()
                    ->constrained('majors');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (Schema::hasColumn('students', 'major_id')) {
                $table->dropForeign(['major_id']);
                $table->dropColumn('major_id');
            }

            if (Schema::hasColumn('students', 'class_id')) {
                $table->dropForeign(['class_id']);
                $table->dropColumn('class_id');
            }
        });
    }
};