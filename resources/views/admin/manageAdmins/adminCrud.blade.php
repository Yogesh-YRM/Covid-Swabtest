@extends('template')
@section('content')
<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Manage Authorized users</h2>
             </div>
             <div class="text-center">
               <a class="btn btn-success" href="{{ route('admin.manageAdmins.adminCrud-Create') }}"> Create New User</a>
             </div>
         </div>
     </div>

     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif

     <table class="table table-bordered">
         <tr>
             <th>No</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($data as $key => $value)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $value->name }}</td>
             <td>{{ $value->email }}</td>
             <td>{{ $value->role }}</td>
             <td>
                  <form action= method="POST">
                        <a class="btn btn-info" href= >Show</a>
                        <a class="btn btn-primary" href= >Edit</a>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
             </td>

         </tr>
         @endforeach
     </table>

</div>



@endsection
