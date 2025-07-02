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
        Schema::table('prediksi', function (Blueprint $table) {
            $table->string('status', 100)->nullable()->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prediksi', function (Blueprint $table) {
            if (Schema::hasColumn('prediksi', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
