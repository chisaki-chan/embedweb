@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: black;">{{ __('Dashboard') }}</div>

                <div class="card-body" style="color: black;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="card" style="color: black;">
                <div class="card-body">
                    <form action="/insertdata" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="exampleFormControlFile1">Upload Gambar</label>
                          <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>
                            <img src="{{ asset('fotopegawai/'.$row->foto) }}" style="width: 40px;">
                        </td>
                        <td>{{ $row->description }}</td>
                        <td>
                            <a href="/delete/{{ $row->id }}" class="btn btn-danger">Delete</a>
                            <a href="/showdata/{{ $row->id }}" class="btn btn-info">Edit</a>
                        </td>
                      </tr> 
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
