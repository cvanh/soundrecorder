<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Report', function (Blueprint $table) {
            $table->id(); // id of the report
            $table->enum('type', ["vibration", "sound", "manual"]); // type of report made
            $table->text('description')->nullable(); // description of report
            $table->text("filename"); // filename of upload
            $table->text("original_name"); // og 
            $table->text("file_path"); // path where the file is stored
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }
    public function down()
    {
        Schema::dropIfExists('Report');
    }
};
