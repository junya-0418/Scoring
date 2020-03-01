<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;

class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'スクレイピングを実行します';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        echo 'スクリプトを実行しました' . PHP_EOL;

    }
}
