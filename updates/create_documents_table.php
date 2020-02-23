<?php namespace Xitara\Documentation\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_documentation_documents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('description')->nullable();
            $table->mediumtext('var_list')->nullable();
            $table->string('namespace', 511)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_documentation_documents');
    }
}
