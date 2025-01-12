<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->down();

        Schema::create($this->buildName('users'), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });

        \LaravelCMS\Models\User::create([
            'name' => 'Admin',
            'email' => config('cms.credentials.email'),
            'password' => \Illuminate\Support\Facades\Hash::make(config('cms.credentials.password')),
        ]);

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

        \LaravelCMS\Models\Lang::create([
            'name' => 'Frensh',
            'locale' => \LaravelCMS\Models\Lang::FR,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'English',
            'locale' => \LaravelCMS\Models\Lang::EN,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'Spanish',
            'locale' => \LaravelCMS\Models\Lang::ES,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'German',
            'locale' => \LaravelCMS\Models\Lang::DE,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'Italian',
            'locale' => \LaravelCMS\Models\Lang::IT,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'Netherland',
            'locale' => \LaravelCMS\Models\Lang::NL,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'Russian',
            'locale' => \LaravelCMS\Models\Lang::RU,
        ]);
        \LaravelCMS\Models\Lang::create([
            'name' => 'Turkish',
            'locale' => \LaravelCMS\Models\Lang::TR,
        ]);

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

        \LaravelCMS\Models\PageContentType::create([
            'name' => \LaravelCMS\Models\PageContentType::INPUT,
        ]);
        \LaravelCMS\Models\PageContentType::create([
            'name' => \LaravelCMS\Models\PageContentType::TEXTAREA,
        ]);
        \LaravelCMS\Models\PageContentType::create([
            'name' => \LaravelCMS\Models\PageContentType::WYSIWYG,
        ]);
        \LaravelCMS\Models\PageContentType::create([
            'name' => \LaravelCMS\Models\PageContentType::IMAGE,
        ]);
        \LaravelCMS\Models\PageContentType::create([
            'name' => \LaravelCMS\Models\PageContentType::VIDEO,
        ]);

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

    public function down()
    {
        Schema::dropIfExists($this->buildName('page_content_langs'));
        Schema::dropIfExists($this->buildName('page_contents'));
        Schema::dropIfExists($this->buildName('page_content_types'));
        Schema::dropIfExists($this->buildName('pages'));
        Schema::dropIfExists($this->buildName('langs'));
        Schema::dropIfExists($this->buildName('user_privilege'));
        Schema::dropIfExists($this->buildName('privileges'));
        Schema::dropIfExists($this->buildName('users'));
    }
};
