@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row col-lg-12">
      @auth
      <div class="col">
          <div >
              <a href="{{route('film.create')}}" class="btn btn-dark m-4">Nouvelle film</a>
          </div>
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">image</th>
                <th scope="col">titre</th>
                <th scope="col">date pub</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($films as $row)
                <tr>
                    <td><img src="{{asset($row->image)}}" style="width: 50px"></td>
                    <td>{{$row->titre}}</td>
                    <td>{{$row->datepub}}</td>
                    <td>          
                        <form action="{{route('film.destroy',$row->id)}}" method="post">
                            <a href="{{route('film.edit',$row->id)}}" class="btn btn-primary">Editer</a>
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        
                    </td>
                  </tr>
                @endforeach
              
              
            </tbody>
          </table>
      </div>
      @endauth
    </div>
  </div>
@endsection