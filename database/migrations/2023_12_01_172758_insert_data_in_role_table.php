<?php

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Role::insert([
            ['name' => RoleEnum::USER],
            ['name' => RoleEnum::ADMIN],
            ['name' => RoleEnum::MODERATOR]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Role::whereNotNull('id')->delete();
    }
};
