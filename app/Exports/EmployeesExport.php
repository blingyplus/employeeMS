<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'UUID',
            'First Name',
            'Last Name',
            'Phone',
            'Email',
        ];
    }
}
