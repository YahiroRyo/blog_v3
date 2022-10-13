<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::create('blogContents', function (Blueprint $table) {
            $table->char('blogId', 26)->primary();

            $table->string('title', 100);
            $table->text('body');
            $table->string('thumbnail', 255);
            $table->timestamp('createdAt')->useCurrent();
        });
    }

    public function down(): void {
        Schema::dropIfExists('blogContents');
    }
};
