@extends('layouts.app')
@section('content')
<div class="container col-12 d-flex justify-content-evenly " >
    <div class="row col-12 ">
        @foreach ($films as $row)
        <div class="col-lg-3 col-md-4 col-sm-6  ">
            <div class="card m-2 " style="width: 18rem;">
                <img src="{{asset($row->image)}}"  class="card-img-top" alt="{{$row->image}}">
                <div class="card-body">
                  <h5 class="card-title">{{$row->titre}}</h5>
                  <h6 class="card-title">{{$row->datepub}}</h6>
                  <a href="{{route('commentaire.show',$row->id)}}" class="btn btn-info col-12">afficher</a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
  </div>
@endsection