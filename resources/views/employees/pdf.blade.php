<!-- resources/views/employees/pdf.blade.php -->

<table>
    <thead>
        <tr>
            <th>UUID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->uuid }}</td>
                <td>{{ $employee->firstname }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
