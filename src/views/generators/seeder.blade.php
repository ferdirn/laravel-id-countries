use Illuminate\Database\Eloquent\Model as Eloquent;

class CountriesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the countries table
        DB::table(\Config::get('laravel-id-countries::table_name'))->delete();

        //Get all of the countries
        $countries = Countries::getList();
        foreach ($countries as $countryId => $country){
            DB::table(\Config::get('laravel-id-countries::table_name'))->insert(array(
                'id' => $countryId,
                'name' => $country['name'],
                'fullname' => ((isset($country['fullname'])) ? $country['fullname'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'capital' => ((isset($country['capital'])) ? $country['capital'] : null),
                'citizenship' => ((isset($country['citizenship'])) ? $country['citizenship'] : null),
                'currency' => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'calling_code' => ((isset($country['calling_code'])) ? $country['calling_code'] : null)
            ));
        }
    }
}
