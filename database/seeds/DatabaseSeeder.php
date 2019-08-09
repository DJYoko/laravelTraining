<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate relational data (Vote & Vote Choice)
        $vote_id = $this->call(VoteTableSeeder::class);

        // Vote choice(s) should be multiple
        $random_number = rand(3,8);
        $counter =0;
        while($counter < $random_number){
            $counter++;
            $this->call(VoteChoicesTableSeeder::class,$vote_id);
        }

    }

    /**
     * call function extend for attach Arguments
     *
     * @param [type] $class
     * @param [type] $extra (optional parameters)
     * @return void
     */
    public function call($class, $extra = null) {
        $result = $this->resolve($class)->run($extra);
        if (isset($this->command)) {
            $this->command->getOutput()->writeln("<info>Seeded:</info> $class");
        }
        return $result;
    }
}
