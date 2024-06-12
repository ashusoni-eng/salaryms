<table>
    <thead>
        <tr>
            <th>Employee</th>
            <th>Month</th>
            <th>Year</th>
            <th>Total Working Days</th>
            <th>Total Leave Taken</th>
            <th>Overtime</th>
            <th>Total Salary Made</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salaries as $salary)
            <tr>
                <td>{{ $salary->employee->name }}</td>
                <td>{{ $salary->month }}</td>
                <td>{{ $salary->year }}</td>
                <td>{{ $salary->total_working_days }}</td>
                <td>{{ $salary->total_leave_taken }}</td>
                <td>{{ $salary->overtime }}</td>
                <td>{{ $salary->total_salary_made }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $salaries->links() }}
