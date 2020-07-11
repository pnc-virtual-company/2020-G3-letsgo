
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
  
    <div class="container" style="margin-top:5%">

        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search users"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
       <table class="table table-borderless" style="margin-top:15px">
           <tr>
               <th>organizer</th>
               <th>City</th>
               <th>Title</th>
               <th>Category</th>
               <th>Start date</th>
           </tr>
           
           @foreach ($events as $event)
           <tr>
           <td>{{$event->user->firstname}}</td>
           <td>{{$event->city->name}}</td>
           <td>{{$event->title}}</td>
           <td>{{$event->category->name}}</td>
           <td>{{$event->start_date}}</td>
            </tr>
           @endforeach

       </table>
    </div>
</body>
</html>

