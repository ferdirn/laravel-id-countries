<?php

namespace Ferdirn\Countries;

/**
 * CountryList
 *
 */
class Countries extends \Eloquent {

	/**
	 * @var string
	 * Path to the directory containing countries data.
	 */
	protected $countries;

	/**
	 * @var string
	 * The table for the countries in the database, is "countries" by default.
	 */
	protected $table;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
       $this->table = \Config::get('laravel-id-countries::table_name');
    }

    /**
     * Get the countries from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    protected function getCountries()
    {
        //Get the countries from the JSON file
        if (sizeof($this->countries) == 0){
            $this->countries = json_decode(file_get_contents(__DIR__ . '/Models/countries.json'), true);
        }

        //Return the countries
        return $this->countries;
    }

	/**
	 * Returns one country
	 *
	 * @param string $id The country id
     *
	 * @return array
	 */
	public function getOne($id)
	{
        $countries = $this->getCountries();
		return $countries[$id];
	}

	/**
	 * Returns a list of countries
	 *
	 * @param string sort
	 *
	 * @return array
	 */
	public function getList($sort = null)
	{
	    //Get the countries list
	    $countries = $this->getCountries();

	    //Sorting
	    $validSorts = array(
	        'name',
	        'fullname',
	        'iso_3166_2',
	        'iso_3166_3',
	        'capital',
	        'citizenship',
	        'currency',
	        'currency_code',
	        'calling_code'
        );

	    if (!is_null($sort) && in_array($sort, $validSorts)){
	        uasort($countries, function($a, $b) use ($sort) {
	            if (!isset($a[$sort]) && !isset($b[$sort])){
	                return 0;
	            } elseif (!isset($a[$sort])){
	                return -1;
	            } elseif (!isset($b[$sort])){
	                return 1;
	            } else {
	                return strcasecmp($a[$sort], $b[$sort]);
	            }
	        });
	    }

	    //Return the countries
		return $countries;
	}
}
