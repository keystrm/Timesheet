@extends('layouts.main_side')
@section('content')

    <h4>Tasks</h4>

    <div class="container">
        <div class="row">
            <form action="{{url('tasks')}}" method="POST">
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
                  <input type="text" class="form-control" name="name" id="name" placeholder="Task Name">
                  <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Description</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                  <span class="text-danger">@error('description'){{$message}}@enderror</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Assign Project</label>
                    <select id="project" name="project" class="form-control">
                      <option selected>Choose...</option>
                      @foreach ($projects as $project)

                      <option value="{{$project->id}}">{{$project->name}}</option>
                          
                      @endforeach
                    </select>
                    <span class="text-danger">@error('project'){{$message}}@enderror</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Assign user</label>
                    <select id="user" name="user" class="form-control">
                      <option selected>Choose...</option>
                      @foreach ($users as $user)

                      <option value="{{$user->id}}">{{$user->name}}</option>
                          
                      @endforeach
                    </select>
                    <span class="text-danger">@error('user'){{$message}}@enderror</span>
                </div>

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
                        <th scope="col">Project</th>
                        <th scope="col">Start time</th>
                        <th scope="col">End time</th>
                        <th scope="col">Value per hour</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$task->task_name}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->project_name}}</td>
                            <td>{{$task->start_time??""}}</td>
                            <td>{{$task->end_time??""}}</td>
                            <td>{{$task->hrate}}</td>
                            <td>@mdo</td>
                        </tr>
                            
                        @endforeach
                  </table>
            </div>
        </div>
    </div>
    
@endsection