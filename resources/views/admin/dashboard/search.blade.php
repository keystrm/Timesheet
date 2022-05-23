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
                      <option selected>Choose...</option>
                      @foreach ($projects as $project)

                      <option value="{{$project->id}}">{{$project->name}}</option>
                          
                      @endforeach
                    </select>

                  </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Assign user</label>
                    <select id="user" name="user" class="form-control">
                      <option selected>Choose...</option>
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
            <div class="container">
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Project</th>
                        <th scope="col">User</th>
                        <th scope="col">Payment</th>


                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                     
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$task['task_name']}}</td>
                            <td>{{$task['project_name']}}</td>
                            <td>{{$task['user_name']}}</td>
                            <td>{{$task['value']}}</td>
                        </tr>
                            
                        @endforeach
                  </table>
            </div>
        </div>
    </div>
    
@endsection