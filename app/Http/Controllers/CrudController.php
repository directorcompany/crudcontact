<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        //
        $projects = Contact::latest()->paginate(15);

        return view('layout.index', compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required','unique:contacts'],
            'telephone' => ['required','unique:contacts'],
            'email' => ['required','email','unique:contacts'],
        ]);

        Contact::create(['name'=>$request->name,
        'telephone'=>$request->telephone,
        'email'=>$request->email,
        ]);

        return redirect()->route('crud.index')
            ->with('success', 'Успешно создано.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact,$id)
    {
        //
           $contact=Contact::find($id);
        return view('layout.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
        return view('layout.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact,$id)
    {
        //
        $request->validate([
            'name' => ['required','unique:contacts'],
            'telephone' => ['required','unique:contacts'],
            'email' => ['required','email','unique:contacts'],
        ]);

    
          
 $contact=Contact::find($id);
      $contact->update($request->all());
        return redirect()->route('crud.index')->with('success', 'Успешно редактировано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact,$id)
    {
        //
        $d=Contact::find($id);
        $d->delete();

       return redirect()->route('crud.index')
            ->with('success', 'Успешно удалено');
    }
}
