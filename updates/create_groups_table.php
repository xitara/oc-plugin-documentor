<?php namespace Xitara\Documentation\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_documentation_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('xitara_documentation_documents_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('group_id')->nullable();
            $table->integer('document_id')->nullable();
            $table->index(['group_id', 'document_id'], 'idx_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_documentation_groups');
        Schema::dropIfExists('xitara_documentation_documents_groups');
    }
}
