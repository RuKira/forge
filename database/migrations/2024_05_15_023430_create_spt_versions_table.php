<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spt_versions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hub_id')
                ->nullable()
                ->default(null)
                ->unique();
            $table->string('version');
            $table->unsignedInteger('version_major');
            $table->unsignedInteger('version_minor');
            $table->unsignedInteger('version_patch');
            $table->string('version_pre_release');
            $table->unsignedInteger('mod_count')->default(0);
            $table->string('link');
            $table->string('color_class');
            $table->softDeletes();
            $table->timestamps();

            $table->index(['version', 'deleted_at', 'id'], 'spt_versions_filtering_index');
            $table->index(['version_major', 'version_minor', 'version_patch', 'version_pre_release', 'deleted_at'], 'spt_versions_lookup_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spt_versions');
    }
};
