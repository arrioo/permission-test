<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->hasRole('user')){
            $journals = $user->journals;
        }else {
            $journals = Journal::all();
        }
        return view('journal.index', compact('journals'))->with('message', 'Create sucess');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('journal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'mentee' => 'required',
        ]);
        $attr = request()->only(['title','description','date','duration','mentee']);
        $attr['user_id'] = auth()->id();
        Journal::create($attr);

        return redirect()->route('journal.index')->with('message', 'Journal Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journal = journal::findOrFail($id);
        return view('journal.update',compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $journal = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'nullable',
            'duration' => 'required',
            'mentee' => 'required',
        ]);

        $journal = Journal::findOrFail($id)->update($journal);

        return redirect()->route('journal.index')->with('message', 'Journal Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();
        
        return redirect()->route('journal.index')->with('message', 'Journal Delete Successfully');
    }
}
