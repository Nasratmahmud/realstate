<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('sub_title')->nullable();
            $table->string('image_url', 255)->nullable();
            $table->string('image_icon', 255)->nullable();
            $table->text('about')->nullable();
            $table->longText('description')->nullable();
            $table->string('button_text', 255)->nullable();
            $table->string('find_me', 255)->nullable();
            $table->timestamps();
        });

		DB::table('c_m_s')->insert([
            // cms Page ................................................................
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
                        //
                        ['title' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_table');
    }
};
