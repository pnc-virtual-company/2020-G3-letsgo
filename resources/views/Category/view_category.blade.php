<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
@extends('layouts.app')

@section('content')

<div class="container">
    {{-- button search --}}
    <div class="form-group has-search mt-4">
        <input type="text" class="form-control" placeholder="Search">
    </div>
    
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
                    <form action="#" method="POST">
                        @csrf
                        @method('POST')
                        <h3 class="mb-4"><b>Create Category</b></h3>
                        <input type="text" name="category" class="form-control mb-4" placeholder="Category name">
                        <button type="submit" class="btn btn-warning float-right text-light ml-2">CREATE</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">DISCARD</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <table class="table table-hover mt-3">
        
        <tbody>
          <tr>
            <td class=" text-info action">Game</td>
            <td class="action_hidden">
                <a href="#" class="text-pimary" data-toggle="modal" data-target="#editCategory"><span class="material-icons">edit</span></a>
                <a href="#" class="text-danger" data-toggle="modal" data-target="#removeCategory"><span class="material-icons text-danger">delete</span></a>
                @method('DELETE')
            </td>

            <!-- Form Update Category -->
            <div class="modal" id="editCategory">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mb-4"><b>Update Category</b></h3>
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control mb-4" placeholder="Category name"  name="category">
                            <button type="submit" class="btn btn-warning float-right text-light ml-2">UPDATE</button>
                            <button class="btn btn-danger float-right" data-dismiss="modal">DISCARD</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            <!-- Form Remove Category -->
            <div class="modal" id="removeCategory">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="#" method="POST">
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
       
      </table>
    
</div>
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
