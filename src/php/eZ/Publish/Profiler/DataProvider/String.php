<?php

namespace eZ\Publish\Profiler\DataProvider;

use eZ\Publish\Profiler\DataProvider;
use Faker;

class String extends DataProvider
{
    public function get($languageCode)
    {
        $faker = Faker\Factory::create();
        return $faker->catchPhrase;
    }
}

