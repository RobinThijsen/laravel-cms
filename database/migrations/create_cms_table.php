<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create($this->buildName('users'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('privileges'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('user_privilege'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid($this->buildName('user_id'))->constrained();
            $table->foreignUuid($this->buildName('privilege_id'))->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('langs'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('locale');
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('pages'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('page_content_types'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('page_contents'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid($this->buildName('page_id'))->constrained();
            $table->foreignUuid($this->buildName('page_content_type_id'))->constrained();
            $table->string('name');
            $table->string('alias');
            $table->string('section');
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->buildName('page_content_langs'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid($this->buildName('page_content_id'))->constrained();
            $table->foreignUuid($this->buildName('lang_id'))->constrained();
            $table->string('name');
            $table->string('label')->nullable();
            $table->text('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    private function buildName($name): string
    {
        return config('cms.database.prefix') . $name;
    }
};
