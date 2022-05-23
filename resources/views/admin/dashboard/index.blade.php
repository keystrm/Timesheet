@extends('layouts.main_side')
@section('content')

    <h4>Projects</h4>

    <div class="container">
        <div class="row">
            <form action="{{url('projects')}}" method="POST">
                @csrf
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if (Session::has('failed'))
                    <div class="alert alert-danger">
                        {{Session::get('failed')}}
                    </div>
                @endif

                <div class="form-group">
                  <label for="inputAddress">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Project Name">
                  <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Description</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                  <span class="text-danger">@error('description'){{$message}}@enderror</span>
                </div>

                <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
               <br>
                <button type="submit" class="btn btn-primary">ADD</button>
              </form>

        </div>
        <br>
        <div class="row">
            <div class="container">
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$project->name}}</td>
                            <td>{{$project->description}}</td>
                            <td>@mdo</td>
                        </tr>
                            
                        @endforeach
                  </table>
            </div>
        </div>
    </div>
    
@endsection