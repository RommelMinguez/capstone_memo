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
        $sql = file_get_contents(database_path('data/refAddress.sql'));
        $queries = explode(';', $sql); // Assuming each SQL command is separated by a semicolon

        // Chunk the import into smaller batches
        $chunks = array_chunk($queries, 1000); // Adjust chunk size as necessary

        foreach ($chunks as $chunk) {
            DB::unprepared(implode(';', $chunk));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
