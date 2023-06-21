<?php namespace Wpjscc\Flashjs\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateWpjsccFlashjsConfig extends Migration
{
    public function up()
    {
        Schema::create('wpjscc_flashjs_config', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('name', 255);
            $table->text('config');
            $table->string('identifier');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wpjscc_flashjs_config');
    }
}
