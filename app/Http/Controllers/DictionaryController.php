<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = \request()->get('q');
        if ($q) {
            $q = strtoupper($q);
            $result = Dictionary::where('english', 'like', "%$q%")->orWhere('persian', 'like', "%$q%")->orderBy('english')->paginate();
        }
        else {
            $result = Dictionary::orderBy('english')->paginate();
        }

        return view('crud/dictionary/index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud/dictionary/create');
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
            'english' => 'required|string',
            'persian' => 'required|string',
        ]);

        $dictionary = Dictionary::create([
            'english' => $request->get('english'),
            'persian' => $request->get('persian')
        ]);

        if ($request->has('save_back')) {
            return redirect()->route('dictionary.index')->with('success', "New item added to your dictionary successfully");
        }

        return redirect()->back()->with('success', "New item added to your dictionary successfully");
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
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\Response
     */
    public function edit(Dictionary $dictionary)
    {
        return view('crud/dictionary/edit', compact('dictionary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dictionary $dictionary)
    {
        $request->validate([
            'english' => 'required|string',
            'persian' => 'required|string',
        ]);


        $dictionary->update([
            'english' => $request->get('english'),
            'persian' => $request->get('persian')
        ]);

        if ($request->has('edit_back')) {
            return redirect()->route('dictionary.index')->with('success', "'{$dictionary->english}' updated successfully");
        }

        return redirect()->back()->with('success', "'{$dictionary->english}' updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dictionary $dictionary
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Dictionary $dictionary)
    {
        $dictionary->delete();
        return redirect()->route('dictionary.index')->with('error', "'{$dictionary->english}' deleted successfully");
    }
}
