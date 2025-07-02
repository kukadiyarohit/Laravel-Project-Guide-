{{-- public function up()
{
Schema::create('employees', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('phone');
$table->string('department'); // store department name or id
$table->enum('gender', ['male', 'female']);
$table->json('job_type'); // part-time / full-time as array
$table->text('address');
$table->date('dob');
$table->decimal('salary', 10, 2);
$table->timestamps();
});
} --}}

{{--
public function index()
{
$employees = Employee::all();
return view('emp.index', compact('employees'));
}


public function store(Request $request)
{
$data = $request->validate([
'name' => 'required',
'phone' => 'required',
'department' => 'required',
'gender' => 'required',
'job_type' => 'required|array',
'address' => 'required',
'dob' => 'required|date',
'salary' => 'required|numeric',
]);

$data['job_type'] = json_encode($data['job_type']); // checkbox array to json

Employee::create($data);

return redirect()->route('emp.index')->with('success', 'Employee Added Successfully');
}

public function edit($id)
{
$employee = Employee::findOrFail($id);
return view('emp.edit', compact('employee'));
}



public function update(Request $request, $id)
{
$data = $request->validate([
'name' => 'required',
'phone' => 'required',
'department' => 'required',
'gender' => 'required',
'job_type' => 'required|array',
'address' => 'required',
'dob' => 'required|date',
'salary' => 'required|numeric',
]);

$data['job_type'] = json_encode($data['job_type']);

Employee::where('id', $id)->update($data);

return redirect()->route('emp.index')->with('success', 'Employee Updated Successfully');
}

public function destroy($id)
{
Employee::findOrFail($id)->delete();
return redirect()->route('emp.index')->with('success', 'Employee Deleted');
}


--}}