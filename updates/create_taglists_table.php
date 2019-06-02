<?php namespace Xitara\Documentation\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateTaglistsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_documentation_taglists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('xitara_documentation_tags_documents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('tag_id')->nullable();
            $table->integer('document_id')->nullable();
            $table->index(['tag_id', 'document_id'], 'idx_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_documentation_taglists');
        Schema::dropIfExists('xitara_documentation_tags_documents');
    }
}
