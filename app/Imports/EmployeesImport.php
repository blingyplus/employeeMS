<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Validators\ValidationException;

class EmployeesImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function model(array $row)
    {
        try {
            // Validate the email field
            $this->validateEmail($row['email']);

            return new Employee([
                'uuid' => $row['uuid'],
                'firstname' => $row['first_name'],
                'lastname' => $row['last_name'],
                'phone' => $row['phone'],
                'email' => $row['email'],
            ]);
        } catch (ValidationException $e) {
            // Log or handle the validation exception as needed
            return null;
        }
    }

    private function validateEmail($email)
    {
        // Add your email validation rules here
        if (Employee::where('email', $email)->exists()) {
            throw ValidationException::withMessages(['email' => 'Email already exists.']);
        }
    }
}
