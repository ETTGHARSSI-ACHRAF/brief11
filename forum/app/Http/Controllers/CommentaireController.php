<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\auth;
class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listes=Film::all();
        return view('film.gallary',['films'=>$listes]);
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
        $commentaire=new Commentaire();
        $commentaire->user_id=Auth::user()->id;
        $commentaire->film_id=$request->film_id;
        $commentaire->message=$request->message;
        $commentaire->save();
        // $film=Film::find($request->film_id);
        // return view('film.contentu',['film'=>$film]);
        return redirect(route("commentaire.show",$request->film_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return redirect(route("film.contenu"));
        $film=Film::find($id);
        
        // $commentaire = Commentaire::find($val);
        // $film->Commontaires();
        return view('film.contentu',['film'=>$film]);
        // dd($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commentaire::destroy($id);
        return redirect()->back();
    }
}
