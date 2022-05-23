@extends('layouts.main_side')
@section('content')

    <h4>Report</h4>

    <div class="container">
        <div class="row">
            <form action="{{url('admin/dashboard/search')}}" method="POST">
                @csrf
                </div>

                <div class="form-group col-md-4">
                    <label for="inputState">Assign Project</label>
                    <select id="project" name="project" class="form-control">
                      <option selected value="">Choose...</option>
                      @foreach ($projects as $project)

                      <option value="{{$project->id}}">{{$project->name}}</option>
                          
                      @endforeach
                    </select>

                  </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Assign user</label>
                    <select id="user" name="user" class="form-control">
                      <option selected value="">Choose...</option>
                      @foreach ($users as $user)

                      <option value="{{$user->id}}">{{$user->name}}</option>
                          
                      @endforeach
                    </select>

                  </div>

               <br>
                <button type="submit" class="btn btn-primary">Search</button>
              </form>

        </div>
        <br>
        <div class="row">
          
        </div>
    </div>
    
@endsection