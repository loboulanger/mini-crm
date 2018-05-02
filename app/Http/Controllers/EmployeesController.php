<?php

namespace App\Http\Controllers;

use Validator;
use App\Employee;
use App\Firm;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $firms = Firm::orderBy('name')->get();
      return view('employees.create', compact('firms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        // dd(request(['lastname', 'firstname']));

        $rules = [
          'lastname' => 'required',
          'firstname' => 'required',
          'firm_id' => 'required|integer|not_in:0',
          'email' => 'nullable|email|unique:employees',
          'phone' => 'nullable|digits:10'
        ];

        $validator = Validator::make($request->all(), $rules, [
          'lastname.required' => 'Vous devez renseigner un nom',
          'firstname.required' => 'Vous devez renseigner un prénom',
          'firm_id.not_in' => 'Vous devez renseigner une entreprise',
          'email.email' => 'Vous devez renseigner un email valide',
          'email.unique' => 'L\'email renseigné existe déjà',
          'phone.digits' => 'Le numéro de téléphone doit comporter 10 chiffres'
        ]);

        if ($validator->fails()) {
          return redirect('employees/create')
                      ->withErrors($validator)
                      ->withInput();
        }

        // $employee = new Employee;

        // Create a new employee using the request data
        // $employee->lastname = request('lastname');
        // $employee->firstname = request('firstname');
        // $employee->firm_id = request('firm_id');
        // $employee->email = request('email');
        // $employee->phone = request('phone');

        Employee::create(request(['lastname', 'firstname', 'firm_id', 'email', 'phone']));

        // Save it to the database
        // $employee->save();

        // And then redirect to the employee list
        return redirect('/employees');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Employee::destroy($id);
      return response()->json([
        'success' => 'Record has been deleted successfully!'
      ]);
    }
}
