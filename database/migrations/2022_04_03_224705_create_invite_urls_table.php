<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteUrlsTable extends Migration
{
    public function up(): void
    {
        Schema::create('invite_urls', function (Blueprint $table) {
            $table->id();
            $table->string('code', 8);
            $table->string('url');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invite_urls');
    }
}
