<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * Top 20 programming languages according to GitHub
		 * 
		 * @var array
		 */
		$languages = array('JavaScript', 'Java', 'Python', 'Ruby', 'CSS', 'PHP', 'C++', 'C', 'Shell', 'C#', 'Objective-C',
							'R', 'VimL', 'Go', 'Perl', 'CoffeeScript', 'TeX', 'Scala', 'Haskell', 'Emacs Lisp');

		Schema::create('languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		/**
		 * Insert languages into languages table
		 */
		foreach($languages as $language) 
		{
	   		DB::table('languages')->insert(
			    array(
			        'name' => $language
			    )
	    	);
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('languages');
	}

}
