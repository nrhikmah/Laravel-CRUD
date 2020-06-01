@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 50rem">
          <div class="card-body">
            <h3 class="card-title">{{$catatan->judul}}</h3>
            <p class="card-text">{{$catatan->isi}}</p>
            <h6 class="card-subtitle mb-2 text-muted">Created: {{$catatan->created_at}}</h6>
            <a href="{{$catatan->id}}/edit" class="btn btn-primary">Edit</a>
          <form action="/catatans/{{$catatan->id}}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
            <a href="/home" class="button button-red">Back</a>
          </div>
        </div>
    </div>
</div>
@endsection
