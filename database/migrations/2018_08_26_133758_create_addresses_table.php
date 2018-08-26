<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAddressesTable.
 */
class CreateAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('zip_code',15);
            $table->string('country',4);
            $table->string('state',4);
            $table->string('city',30);
            $table->string('district',30);
            $table->string('street',100);
            $table->string('complement',100);
            $table->string('number',100);
            $table->integer('addressable_id');
            $table->string('addressable_type',20);
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
		Schema::drop('addresses');
	}
}
