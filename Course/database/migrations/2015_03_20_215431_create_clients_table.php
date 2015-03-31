<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("client_firstname");
			$table->string("client_lastname");
			$table->boolean("is_active")->default(true);
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
		/*Schema::table('clients', function(Blueprint $table){
			$table->dropForeign('clients_company_id_foreign');
			$table->dropColumn("company_id");
		});*/
		Schema::drop('clients');
	}

}
