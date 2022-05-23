@extends('layouts.main_side')
@section('content')

    <h3>Tasks</h3>

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
                @foreach ($tasks as $task)
             
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                    <td></td>
                    

                </tr>
                    
                @endforeach
          </table>
    </div>
    
@endsection