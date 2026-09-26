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
            if(!schema::hasColumn('students', 'user_id')) {
                $table->foreignId('user_id')
                ->unique()
                ->after('id')
                ->constrained('users');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
             if(!schema::hasColumn('students', 'user_id')) {
                $table->dropforeign(['user_id']);
                $table->dropColumn('user_id');  
            }
        });
    }
};
