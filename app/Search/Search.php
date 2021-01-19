<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;
use App\Aset;
use App\AsetProv;
use App\Berita;
use App\Pariwisata;
use App\Perikanan;
use App\Perkebunan;
use App\Pertanian;
use App\Peternakan;

class Search extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        Pertanian::class,
        Perikanan::class,
        Pariwisata::class,
        Perkebunan::class,
        Peternakan::class,
        Berita::class,
        Aset::class,
        AsetProv::class,
    ];
}
