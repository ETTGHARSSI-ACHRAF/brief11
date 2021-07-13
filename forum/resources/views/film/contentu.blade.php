@extends('layouts.app')

@section('content')
<div class="container col-12">
    <div class="row">
      <div class="col-4 text-center">
            <img src="{{asset($film->image)}}" style="width: 400px" alt="" srcset="">
      </div>
      <div class="col-8">
        <h1 >{{$film->titre}}</h1>
        <h3>{{$film->datepub}}</h3>
       
      
      </div>
    </div>
    <div class="row mt-5">
     
      <div class="col-12">
        <h3 >les Commentaires</h3>
        @foreach ($film->commontaires() as $commentaire)
        <div class="">
          <h4><span style="font-size: 15px">{{$commentaire->created_at}}</span></h4>
          <div class="content d-flex justify-content-between">
            <h4 class="pt-1 mx-5" >{{$commentaire->message}}</h4>
            {{-- {{ $commentaire->user_id }} --}}
            @auth
            @if ($commentaire->user_id==Auth::user()->id)
            <form action="{{route('commentaire.destroy',$commentaire->id)}}" method="post">
              {{-- <a href="" class="btn btn-sm btn-primary"  onclick="edite()">Editer</a> --}}
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit"  class="btn btn-sm btn-danger">Supprimer</button>
              </form> 
            @endif
            
            @endauth
         
       
          </div>
          <div class="lign bg-dark" style="height: 0.5px;">

          </div>
      </div>
      @endforeach
    </div>
  </div>

    @auth
  
    <div class="row mt-5">
    
      <div class="col-12">
      <form action="{{route('commentaire.store')}}" class="d-flex justify-content-center" method="post">
        @csrf
        <input type="hidden" name="film_id" value="{{$film->id}}">
        <input type="text" class="form-control" name="message">
        <input class="btn btn-dark " type="submit" value="add" > 
      </form>
    </div>
  </div>
    @endauth
    
  </div>
@endsection