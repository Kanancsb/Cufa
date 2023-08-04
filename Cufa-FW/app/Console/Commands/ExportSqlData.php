<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportSqlData extends Command
{
    protected $signature = 'export:sql {table}';
    protected $description = 'Export data from a table to an SQL file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $table = $this->argument('table');
        $filename = "{$table}_data.sql";
        $path = storage_path("exports/{$filename}");

        $data = DB::table($table)->get();
        $sql = '';

        foreach ($data as $row) {
            $columns = [];
            foreach ($row as $key => $value) {
                $columns[] = "{$key}='" . addslashes($value) . "'";
            }
            $sql .= "INSERT INTO {$table} SET " . implode(', ', $columns) . ";\n";
        }

        File::put($path, $sql);

        $this->info("Data from '{$table}' table exported to '{$filename}'");
    }
}

