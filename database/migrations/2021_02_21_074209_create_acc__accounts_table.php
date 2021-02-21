<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc__accounts', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->unsignedBigInteger('organisationName');
            $table->foreign('organisationName')->references('id')->on('acc__organisation_names');
            $table->Date('date');
            $table->string('billNumber');
            $table->Date('billDate');
            $table->double('5%Amount')->nullable();
            $table->double('12%Amount')->nullable();
            $table->double('18%Amount')->nullable();
            $table->double('5%Tax')->nullable();
            $table->double('12%Tax')->nullable();
            $table->double('18%Tax')->nullable();
            $table->string('interstate_local');
            $table->enum('filled_notfilled', ['notfilled', 'filled']);
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
        Schema::dropIfExists('acc__accounts');
    }
}
