<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<style>
    body {
        background-color: #000;
    }
    .container {
        background-image: url('../images/background.jpg');
        background-size: cover;
        margin-top: 20px;
        margin-bottom: 20px;
        border: #fff solid 10px;
        border-radius: 10px;
        height: auto;
        width: auto;
        background-repeat: no-repeat;

    }

    h1 {
        color: #fff;
        text-shadow: 2px 5px 5px #fff;
    }

    table {
        font-size: 20px;
        font: bolder;
        font-style: italic;
        background: rgba(255,255,255,0.5);
        
    }

    td {
        text-shadow: 2px 5px 5px #000;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <br>
            <h1>To Do List</h1>
            <div class="row">
                <div class="col-md-12">

                    {{-- Catch all errors in validation --}}
                    @foreach ($errors->all() as $error)

                    {{-- alert alert danger is a bootstrap class --}}
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>

                    @endforeach

                    {{-- this form-control, btn-primary and btn-warning are bootstrap classes --}}
                    <form method="POST" action="/saveTask">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here">
                        <br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>
                    <br><br>
                    <table class="table text-body">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Completed</th>
                        <th>Action</th>

                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->task}}</td>

                                <td>
                                    @if ($task->iscompleted)
                                        
                                        <button class="btn btn-success bi bi-check2-circle"></button>
                                    
                                    @else

                                        <button class="btn btn-warning bi bi-emoji-smile-upside-down"> Not-Completed</button>
                                        
                                    @endif
                                </td>
                                <td>
                                    @if (!$task->iscompleted)
                                        <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                                    @else
                                        <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark As Not Completed</a>
                                    @endif

                                    <a href="/updatetask/{{$task->id}}" class="btn btn-warning bi bi-pen"></a>
                                    <a href="/deletetask/{{$task->id}}" class="btn btn-warning bi bi-trash3"></a>
                                    
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>