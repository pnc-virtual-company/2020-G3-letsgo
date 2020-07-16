<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
@extends('admin.dashboard')

@section('content')

<div class="container">
    {{-- button search --}}
    <form action="search" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary">Search</button>
            </span>
        </div>
    </form>
        
    <h3><b class="text-success"></b>Categories</h3>
    <div class="row">
        <div class="col-md-11"></div>
        <div class="col-md-1">
            <button class="btn btn-warning text-light" data-toggle="modal" data-target="#addCategory">Create</button>
           
        </div>

       
        <!-- Form Add Category -->
        <div class="modal" id="addCategory">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <form  action="{{route('category.store')}}" method="POST">
                         @csrf
                        <h3 class="mb-4"><b>Create Category</b></h3>
                        <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Your category..." autocomplete="off">

                       <!-- alert text when category already exist -->
                        <span id="message" class="text-danger"></span>

                        <button type="submit" class="btn btn-warning float-right text-light ml-2">CREATE</button>
                        <button type="submit" class="btn btn-danger float-right" data-dismiss="modal">DISCARD</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <table class="table table-hover mt-3">
        @foreach ($categories as $category)
        <tbody>
          <tr>
            <td class=" text-info action">{{$category->name}}</td>
            <td class="action_hidden">
            <a href="{{route('Category.update',$category->id)}}" class="text-pimary" data-toggle="modal"   data-target="#editCategory{{$category->id}}"><span class="material-icons">edit</span></a>
                <a href="{{route('Category.destroy',$category->id)}}" class="text-danger" data-toggle="modal" data-target="#removeCategory{{$category->id}}"><span class="material-icons text-danger">delete</span></a>
                @method('DELETE')
            </td>

            <!-- Form Update Category -->
            <div class="modal" id="editCategory{{$category->id}}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mb-4"><b>Update Category</b></h3>
                        <form action="{{route('Category.update',$category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control mb-4" placeholder="Category name"  name="category" value="{{$category->name}}">
                            <button type="submit" class="btn btn-warning float-right text-light ml-2">UPDATE</button>
                            <button class="btn btn-danger float-right" data-dismiss="modal">DISCARD</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            <!-- Form Remove Category -->
            <div class="modal" id="removeCategory{{$category->id}}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{route('Category.destroy',$category->id)}}"  method="POST">
                            @csrf
                            @method('DELETE')
                            <h3 class="mb-4"><b>Remove Category</b></h3>
                            <p>Are you sure you want to delete the category?</p>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">DISCARD</button>
                            <button type="submit" class="btn btn-warning float-right text-light ml-2">REMOVE</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
          </tr>
        </tbody>
        @endforeach
      </table>
</div>
 <script>
          $(document).ready(function(){
             $(document).on('keyup','#name', function(){
                   var result = $(this).val();
                   message_exist(result);
             });

             message_exist();
             function message_exist(result){
                $.ajax({
                    url:"{{route('category.exist')}}",
                    method: 'get',
                    data: {result:result},
                    dataType: 'json',
                    success: function(message) {
                        if(message != '') {
                            $('#message').html('This category already existed');
                        }else {
                            $('#message').html('');
                        }
                    }
                })
            }
  });
</script>
@endsection
<style>
    .action_hidden{
        float: right;
        display: none;
    }
    .action:hover+ .action_hidden{
        display:block;
    }
    .has-search{
        border-radius: 10px;
    }

</style>



