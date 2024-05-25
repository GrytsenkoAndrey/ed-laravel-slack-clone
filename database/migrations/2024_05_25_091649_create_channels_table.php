<?php

use App\Enums\Workspace\Visibility;
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
        Schema::create('channels', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('reference');
            $table->string('description')->nullable();
            $table->string('visibility')->default(Visibility::Public->value);
            $table
                ->foreignUlid('user_id')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();
            $table
                ->foreignUlid('workspace_id')
                ->index()
                ->constrained('workspaces')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['reference', 'workspace_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
