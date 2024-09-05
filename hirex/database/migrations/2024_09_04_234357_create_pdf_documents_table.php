<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pdf_documents', function (Blueprint $table) {
            $table->fullText(['title', 'content']);
        });
    }
    
    public function down()
    {
        Schema::table('pdf_documents', function (Blueprint $table) {
            $table->dropFullText(['title', 'content']);
        });
    }
    
};
