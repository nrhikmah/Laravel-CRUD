@extends('layouts.app')

@section('content')

<div class="container">
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
     @endif
    <div class="row justify-content-center">
        @foreach ($catatans as $catatan)
          <ul class="list-group">
            <li class="list-group-item d-inline-flex align-items-center mr-3">
            <a href="catatans/{{$catatan->id}}" style="text-decoration: none">
                        <h3>{{$catatan->judul}}</h3>
                        <h6 class="card-subtitle mb-2 text-muted">Created: {{$catatan->created_at}}</h6>
                         <h6 class="card-subtitle mb-2 text-muted">Modified: {{$catatan->updated_at}}</h6>
                    </a>
                <a href="" class="badge  badge-pill" style="padding-bottom:5rem "><i class="far fa-heart"></i></a>
            </li>
            
          </ul>
        @endforeach
    </div>
</div>
@endsection
