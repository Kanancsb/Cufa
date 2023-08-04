<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportData extends Command
{
    protected $signature = 'export:data {table}';
    protected $description = 'Export data from a table to a JSON file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $table = $this->argument('table');
        $data = DB::table($table)->get();

        $filename = "{$table}_data.json";
        $directory = storage_path("exports");

        if (!File::exists($directory)) {
            File::makeDirectory($directory);
        }

        $path = "{$directory}/{$filename}";

        File::put($path, json_encode($data, JSON_PRETTY_PRINT));

        $this->info("Data from '{$table}' table exported to '{$filename}'");
    }
}


