<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO: Add pagination
        $employees = employee::query();

        if (request()->has('employee') && request('employee') != 'null') {
            $employees->where('id', request('employee'));
        }
        if (request()->has('role') && request('role') != 'null') {
            $employees->where('role', request('role'));
        }
        if (request()->has('union') && request('union') != 'null') {
            $employees->where('union', request('union'));
        }
        if (request()->has('valid_driver') && request('valid_driver') != 'null') {
            $employees->where('valid_driver', request('valid_driver'));
        }
        if (request()->has('first_name') && request('first_name') != 'null') {
            $employees->where('first_name', 'like', '%' . request('first_name') . '%');
        }
        if (request()->has('middle_name') && request('middle_name') != 'null') {
            $employees->where('middle_name', 'like', '%' . request('middle_name') . '%');
        }
        if (request()->has('last_name') && request('last_name') != 'null') {
            $employees->where('last_name', 'like', '%' . request('last_name') . '%');
        }


        return response()->json($employees->get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreemployeeRequest $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required',
            'photo' => 'required',
            'role' => 'required',
            'union' => 'required',
            'valid_driver' => 'required',
        ]);

        //Store new employee
        $employee = employee::create($request->all());

        //Return the employee if successful
        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeeRequest $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        //
    }
}
