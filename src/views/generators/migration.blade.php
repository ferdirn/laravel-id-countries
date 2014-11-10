use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the countries table
		Schema::create(\Config::get('laravel-id-countries::table_name'), function($table)
		{
		    $table->integer('id')->index();
		    $table->string('name', 255)->default('');
		    $table->string('fullname', 255)->nullable();
		    $table->char('iso_3166_2', 2)->default('');
		    $table->char('iso_3166_3', 3)->default('');
		    $table->string('capital', 255)->nullable();
		    $table->string('citizenship', 255)->nullable();
		    $table->string('currency', 255)->nullable();
		    $table->string('currency_code', 255)->nullable();
		    $table->string('calling_code', 3)->nullable();

		    $table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(\Config::get('laravel-id-countries::table_name'));
	}

}
