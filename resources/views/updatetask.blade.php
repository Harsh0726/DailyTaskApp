<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Update Task</title>
</head>
<body>
    <div class="container">
        <form action="/edittask" method="post">
            {{csrf_field()}}
            <br>
            <input type="text" class="form-control" name="task" value="{{$taskdata->task}}"/>
            <input type="hidden" name="id" value="{{$taskdata->id}}">
            <br>
            <input type="submit" class="btn btn-warning" value="Update">
            
            &nbsp;&nbsp;<input type="button" class="btn btn-danger" value="cancel">
        </form>
    </div>
</body>
</html>