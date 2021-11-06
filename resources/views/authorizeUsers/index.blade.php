@extends('template')
@section('content')

<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Manage Authorized users</h2>
             </div>
             <div class="text-center">
               <a class="btn btn-success" href="{{ route('authorizeUsers.create') }}">Nieuwe Gebruiker</a>
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
             <th>Voornaam</th>
             <th>Achternaam</th>
             <th>Email</th>
             <th>Rol</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($data as $key => $value)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $value->voornaam }}</td>
             <td>{{ $value->achternaam }}</td>
             <td>{{ $value->email }}</td>
             <td>{{ $value->role }}</td>
             <td>
                  <form action="{{ route('authorizeUsers.destroy', $value->id)}}" method="POST">
                        <a class="btn btn-primary" href="{{ route('authorizeUsers.edit',$value->id) }}" >Bijwerken</a>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Verwijderen</button>
                  </form>
             </td>

         </tr>
         @endforeach
     </table>

</div>



@endsection


