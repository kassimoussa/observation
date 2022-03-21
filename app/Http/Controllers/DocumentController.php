<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function download(Document $document)
    {
        //$path = storage_path('app/'.$document->path);
        $path = $document->path;
        return response()->download($path);
        //
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) { 
                $name = time() . '_' . $file->getClientOriginalName();
                $insert[$key]['file_name'] = $name;
                $path = $file->storeAs('public/files', $name); 
                $insert[$key]['path'] = "storage/files/".$name;
                $insert[$key]['numero_fiche'] = $request->numero_fiche;
            }
        }
        Document::insert($insert);
        return back()-> with('success','Le document a bien été enregistrer.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //$path = storage_path('app/'.$document->path);
        $path = $document->path;
        if(File::exists($path)){
            File::delete($path);
            $document->delete();
            return back()->with('success', 'document supprimé');
        }else{
            return back()->with('fail','File does not exists.');
        }
        
    }
}
