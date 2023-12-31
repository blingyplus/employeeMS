<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;
use Barryvdh\Snappy\Facades\SnappyPdf;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('employees.index', compact('employees'));
    }


    public function count()
    {
        $employeeCount = Employee::count();

        return response()->json(['employeeCount' => $employeeCount]);
    }
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:employees,email'],
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'email' => ['required', 'email', Rule::unique('employees', 'email')->ignore($employee->id)],
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',

        ]);

        Excel::import(new EmployeesImport, $request->file('file'));

        return redirect()->route('employees.index')
            ->with('success', 'Employees imported successfully');
    }


    public function exportPdf()
    {
        $employees = Employee::all();

        $pdf = SnappyPdf::loadView('employees.pdf', compact('employees'));

        return $pdf->download('employees.pdf');
    }
}
