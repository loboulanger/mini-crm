<?php

namespace App\Http\Controllers;

use Validator;
use App\Firm;
use Illuminate\Http\Request;

class FirmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::paginate(5);
        return view('firms.index', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('firms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' => 'required',
        'email' => 'nullable|email|unique:employees',
        'url' => 'nullable|url'
      ];

      $validator = Validator::make($request->all(), $rules, [
        'name.required' => 'Vous devez renseigner un nom',
        'email.email' => 'L\'adresse email n\'est pas valide',
        'email.unique' => 'L\'email renseigné existe déjà',
        'url.url' => 'L\'url n\'est pas valide'
      ]);

      if ($validator->fails()) {
        return redirect('firms/create')
                    ->withErrors($validator)
                    ->withInput();
      }

      Firm::create(request(['name', 'email', 'url']));

      return redirect('/firms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function edit(Firm $firm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $firm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        //
    }
}
