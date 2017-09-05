<?php

use Illuminate\Database\Seeder;
use App\InfoMarathon;
use App\Scrapy\ParserMarathonWeb;
class InfoMarathonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('info_marathons')->delete();

        $parser = new ParserMarathonWeb();

        $races = $parser->getInfoMarathons();

        foreach ($races as $race) {
          $race->save();
        }
    }
}
