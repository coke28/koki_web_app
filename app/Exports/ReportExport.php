<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class reportExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $headers;
    protected $table;

    public function __construct($headers, $table)
    {
        $this->headers = $headers;
        $this->table = $table;
    }

    public function headings(): array
    {
        return $this->headers;
    }

    public function collection()
    {
        
        return collect($this->table);
    }
}
