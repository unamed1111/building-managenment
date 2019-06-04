<?php

namespace App\Exports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ResidentsExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{

    use Exportable;

    protected $residents;

    public function __construct($residents)
    {
        $this->residents = $residents;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $residents = $this->residents;
        $residents->transform(function ($resident, $key) {
            $resident->gender = GENDER[$resident->gender];
            return $resident;
        });
        return $residents;
    }

    public function map($resident): array
    {
        return [
            $resident->id,
            $resident->name,
            $resident->dob,
            $resident->gender,
            $resident->passport,
            $resident->email,
            $resident->phone,
            $resident->apartment ? $resident->apartment->name : 'Không có nhà'
        ];
    }

    public function headings() : array
    {
        $headings = [
            'id', 'Tên Cư dân', 'Ngày sinh', 'Giới tính','Chứng minh thư nhân dân', 'Email', 'Số điện thoại','Căn hộ đang ở'
        ];
        return $headings;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
