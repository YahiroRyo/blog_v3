<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up() : void {
        Schema::create('activeUsers', function (Blueprint $table) {
            $table->foreignId('userId');

            $table->timestamp('createdAt')->useCurrent();
        });
    }

    public function down() : void {
        Schema::dropIfExists('activeUsers');
    }
};
