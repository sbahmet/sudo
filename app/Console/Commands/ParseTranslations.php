<?php

namespace App\Console\Commands;

use App\Services\GSpreadSheetsTranslations\GSpreadsheetsTranslationsReader;
use Illuminate\Console\Command;

class ParseTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses translations from a google spreadsheet to lang-files';

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
        $gSheetsTransReader = new GSpreadsheetsTranslationsReader();

        $gSheetsTransReader->process();
    }
}
