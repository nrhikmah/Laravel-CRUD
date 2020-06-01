@extends('layouts.app')
{{-- @section('title','Form Tambah Data') --}}
@section('content')

<div class="container">
    <div class="row d-inline justify-content-center">
        <h1>Edit Your Note</h1>
    <form method="POST" action="/catatans/{{$catatan->id}}">
        @method('patch')
            @csrf
        <div class="form-group">
            <label for="judul">Title</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" rows="3" name="judul"  placeholder="Add Title" value="{{$catatan->judul}}"></input>

          {{-- pesan error --}}
            @error('judul')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="isi">Note</label>
          <textarea name="isi" id="isi" cols="30" rows="10" class="form-control @error('isi') is-invalid @enderror" placeholder="Add Your Note"  >{{$catatan->isi}}</textarea>
             {{-- pesan error --}}
           @error('isi')
           <div class="invalid-feedback">
             {{$message}}
           </div>
           @enderror

            </div>
          
          <button type="submit" class="btn btn-primary">Edit!</button>
        </form>
    </div>
</div>
@endsection
