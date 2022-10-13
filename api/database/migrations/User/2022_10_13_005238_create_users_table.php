<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up() : void {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');

            $table->string('email', 256);
            $table->char('password', 60);
            $table->timestamp('createdAt')->useCurrent();
        });
    }

    public function down() : void {
        Schema::dropIfExists('users');
    }
};
