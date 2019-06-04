<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EmployeesExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{

    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $employees = Employee::get(['id','name','dob','gender','position','email','phone', 'address']);
        $employees->transform(function ($employee, $key) {
            $employee->gender = GENDER[$employee->gender];
            $employee->position = POSITION[$employee->position];
            return $employee;
        });
        return $employees;
    }

    public function map($employee): array
    {
        return [
            $employee->id,
            $employee->name,
            $employee->dob,
            $employee->gender,
            $employee->position,
            $employee->email,
            $employee->phone,
            $employee->address,
        ];
    }

    public function headings() : array
    {
        $headings = [
            'id', 'Tên nhân viên', 'Ngày sinh', 'Giới tính','Vị trí, Chức vụ', 'Email', 'Số điện thoại', 'Địa chỉ'
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
