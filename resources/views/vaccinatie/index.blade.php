@extends('template')
@section('content')

<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Vaccinatie</h2>
             </div>
             <div class="text-center">
               <a class="btn btn-secondary" href="{{ route('vaccinatie.create') }}">Gebruiker Vaccineren</a>
             </div>
         </div>
     </div>

     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif

     <table class="table table-bordered">
         <tr><th>No</th>
             <th>Voornaam</th>
             <th>Aachternaam</th>
             <th>Geboorte Datum</th>
             <th>ID-Nummer</th>
             <th>Fabrikant</th>
             <th>Status</th>
             <th >Action</th>
         </tr>
         @foreach ($data as $key => $value)
         <tr>
             <td>{{ $value->vax_id }}</td>
             <td>{{ $value->voornaam }}</td>
             <td>{{ $value->achternaam }}</td>
             <td>{{ $value->geboorte_datum }}</td>
             <td>{{ $value->id_nummer }}</td>
             <td>{{ $value->manufracturer }}</td>
             <td>{{ $value->status }}</td>
             <td>
                  <form action="{{ route('vaccinatie.destroy', $value->vax_id)}}" method="POST">
                        <a class="btn btn-info" href="{{ route('vaccinatie.show',$value->vax_id) }}" ><i class="bi bi-eye"></i></a>
                        <a class="btn btn-warning" href="{{ route('vaccinatie.edit',$value->vax_id) }}" ><i class="bi bi-pencil-square"></i></a>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                  </form>
             </td>

         </tr>
         @endforeach
     </table>

</div>



@endsection



