<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Parser\ParserService;

class ParseProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсер подшипников';

    private $service;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = app(ParserService::class);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->service->parseListProducts();
        return true;
    }
}
