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
        'url' => 'nullable|url',
        'logo' => 'nullable|mimes:jpg,jpeg,png,gif|max:1999|dimensions:min_width=150,min_height=150'
      ];

      $validator = Validator::make($request->all(), $rules, [
        'name.required' => 'Vous devez renseigner un nom',
        'email.email' => 'L\'adresse email n\'est pas valide',
        'email.unique' => 'L\'email renseigné existe déjà',
        'url.url' => 'L\'url n\'est pas valide',
        'logo.image' => 'Le logo doit être au format jpg, jpeg, png ou gif',
        'logo.max' => 'Le poids du logo doit être inférieur à 2Mb',
        'logo.dimensions' => 'Les dimensions du logo doivent être au minimum de 150px X 150px'
      ]);

      // Handle file upload
      if ($request->hasFile('logo')) {
          // Get filename with extension
          $FileNameWithExt = $request->file('logo')-> getClientOriginalName();
          // Get just filename
          $filename = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
          // Get just extension
          $extension = $request->file('logo')->getClientOriginalExtension();
          // Filename to store
          $FileNameToStore =$filename . '_' . time() . '.' . $extension;

          // Get firm's name
          $FirmName = $request->input('name');

          // Upload image
          $path = $request->file('logo')->storeAs('firms/'.$FirmName, $FileNameToStore ,'public');
      }
      else {
        $FileNameToStore = '-';
      }

      // Create Firm
      $firm = new Firm;
      $firm->name = $request->input('name');
      $firm->email = $request->input('email');
      $firm->url = $request->input('url');
      $firm->logo = $FileNameToStore;
      $firm->save();

      if ($validator->fails()) {
        return redirect('firms/create')
                    ->withErrors($validator)
                    ->withInput();
      }

      // Firm::create(request(['name', 'email', 'url']));

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
