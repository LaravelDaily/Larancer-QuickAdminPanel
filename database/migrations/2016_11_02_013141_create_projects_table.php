<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id', 'fk_13_client_client_id_project')->references('id')->on('clients');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->string('budget');
            $table->integer('project_status_id')->unsigned()->nullable();
            $table->foreign('project_status_id', 'fk_12_projectstatus_project_status_id_project')->references('id')->on('project_statuses');
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
