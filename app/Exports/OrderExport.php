<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Customer',
            'Studio',
            'Film',
            'Tanggal',
            'Jam',
            'Total Harga',
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        $fields = [
            $row->customers->name,
            $row->studios->nama_studio,
            $row->films->judul,
            $row->tanggal,
            $row->jam,
            $row->total_harga
        ];
        return $fields;
    }
}
