<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccOrganisationNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc__organisation_names', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->string('organisationName');
            $table->string('GST_No');
            $table->string('address');
            $table->string('createdBy');
            $table->string('updatedBy');
            $table->enum('isDeleted', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acc__organisation_names');
    }
}
