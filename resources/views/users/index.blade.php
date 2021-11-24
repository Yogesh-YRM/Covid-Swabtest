@extends('template')
@section('content')

<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Gebruikers</h2>
             </div>
             <div class="text-center">
               <a class="btn btn-secondary" href="{{ route('users.create') }}">Gebruiker toevoegen</a>
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
             <th>Geboorte Datum</th>
             <th>ID-Nummer</th>
             <th class = "act-gebr">Action</th>
          {{--  <th>OPTIES</th> --}}
         </tr>
         @foreach ($data as $key => $value)
         <tr>
             <td>{{ $value->id }}</td>
             <td>{{ $value->voornaam }}</td>
             <td>{{ $value->achternaam }}</td>
             <td>{{ $value->geboorte_datum }}</td>
             <td>{{ $value->id_nummer }}</td>
             <td>
                  <form action="" method="POST">
                        <a class="btn btn-info" href="{{ route('users.show',$value->id) }}" ><i class="bi bi-eye"></i></a>
                        <a class="btn btn-warning" href="{{ route('users.edit',$value->id) }}" ><i class="bi bi-pencil-square"></i></a>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                  </form>
             </td>

       {{--       <td>
                <a class="btn btn-info" href="{{ route('vaccinatie.show',$value->id) }}" ><i class="bi bi-eye"></i></a>
                <a class="btn btn-warning" href="{{ route('vaccinatie.edit',$value->id) }}" ><i class="bi bi-pencil-square"></i></a>
             </td>
             --}}

         </tr>
         @endforeach
     </table>

</div>



@endsection



