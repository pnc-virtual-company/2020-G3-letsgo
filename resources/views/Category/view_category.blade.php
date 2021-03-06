{{-- javascript link --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
@extends('admin.dashboard')

@section('content')
<div class="container"  style="margin-top:100px;">
  <div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
    {{-- button search --}}
    <form action="search" method="get">
        <div class="input-group">
            <input type="search" name="search" id="search" class="form-control" placeholder="Search">
        </div>
    </form>
        
    <h1 class="text-center">Categories</h1>
    <div class="row mt-5">
        <div class="col-md-11"></div>
        <div class="col-md-11">
            <button class="btn btn-warning text-light" data-toggle="modal" data-target="#addCategory">Add New</button>

        </div>

       
        <!-- Form Add Category -->
        <div class="modal fade" id="addCategory">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <form  action="{{route('category.store')}}" method="POST">
                         @csrf
                        <h3 class="mb-4"><b>Create Category</b></h3>
                        <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Your category..." autocomplete="off">

                       <!-- alert text when category already exist -->
                        <span id="message" class="text-danger"></span>
                        <button type="submit" class="text-primary btn btn-outline-default float-right">CREATE</button>
                        <a type="submit" class="text-danger float-right" data-dismiss="modal">DISCARD</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <table class="table table-warning table-hover mt-3">
        @foreach ($categories as $category)
        <tbody id="myTable">
          <tr>
            <td class="text-dark action">{{$category->name}}</td>
            <td class="action_hidden">
            <a href="{{route('Category.update',$category->id)}}" class="text-pimary" data-toggle="modal"   data-target="#editCategory{{$category->id}}"><span class="material-icons">edit</span></a>
                <a href="{{route('Category.destroy',$category->id)}}" class="text-danger" data-toggle="modal" data-target="#removeCategory{{$category->id}}"><span class="material-icons text-danger">delete</span></a>
                @method('DELETE')
            </td>

            <!-- Form Update Category -->
            <div class="modal fade" id="editCategory{{$category->id}}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mb-4"><b>Update Category</b></h3>
                        <form action="{{route('Category.update',$category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control mb-4" placeholder="Category name"  name="category" value="{{$category->name}}">
                            <button type="submit" class="text-primary btn btn-outline-default float-right">UPDATE</button>
                            <a class="text-danger float-right" data-dismiss="modal">DISCARD</a>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            <!-- Form Remove Category -->
            <div class="modal fade" id="removeCategory{{$category->id}}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{route('Category.destroy',$category->id)}}"  method="POST">
                            @csrf
                            @method('DELETE')
                            <h3 class="mb-4"><b>Remove Category</b></h3>
                            <p>Are you sure you want to delete the category?</p>
                            <button type="submit" class="text-danger btn btn-outline-default float-right">REMOVE</button>
                            <a type="button" class="text-primary float-right" data-dismiss="modal">DISCARD</a>
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
<div class="col-md-1"></div>
</div>
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
        text: center;
        display: none;
    }
    .action:hover+ .action_hidden{
        display:block;
    }
    .has-search{
        border-radius: 10px;
    }

</style>
<script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
