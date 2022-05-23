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
                    <td>
                        <form action="{{url('tasks/'.$task->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$task->id}}">

                            @if (($task->start_time)&&($task->end_time))

                            @elseif(($task->start_time))
                            <input type="hidden" name="type" value="0">
                            <button type="submit" class="btn btn-danger">Stop</button>

                            @else
                            <input type="hidden" name="type" value="1">
                            <button type="submit" class="btn btn-success">Start</button>
                                
                            @endif
                        </form>
                    </td>
                    

                </tr>
                    
                @endforeach
          </table>
    </div>
    
@endsection