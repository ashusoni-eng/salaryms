<p>Dear {{ $salary->employee->name }},</p>
<p>Your salary for {{ $salary->month }}/{{ $salary->year }} has been calculated as {{ $salary->total_salary_made }}.</p>
<p>Details:</p>
<ul>
    <li>Total Working Days: {{ $salary->total_working_days }}</li>
    <li>Total Leave Taken: {{ $salary->total_leave_taken }}</li>
    <li>Overtime: {{ $salary->overtime }}</li>
</ul>
