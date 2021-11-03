@extends('template')
@section('content')
<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Registraties overzicht</h2>
             </div>
             <div class="text-right">
             <!-- <div class="col-sm-10"> -->
             <input type="text" name="searchregistration" class="form-control col-sm-10 pull-left" id="" placeholder="">
<!-- </div> -->
               <a class="btn btn-success" href="{{ route('admin.manageAdmins.adminCrud-Create') }}">Search</a>
             </div>
         </div>
     </div>



     <table class="table table-bordered">
         <tr>
             <th>Registratie datum</th>
             <th>ID-nummer</th>
             <th>Naam</th>
             <th>Telefoon</th>
             <th>Status</th>
             <th width="280px">Action</th>
         </tr>
      @foreach($registraties as $reg)
         <tr>
             <td>{{date("d-m-Y", strtotime($reg->created_at))}}</td>
             <td>{{$reg->id_number}}</td>
             <td>{{$reg->firstname}} {{$reg->lastname}}</td>
             <td>{{$reg->phonenumber}}</td>
             <td>{{$reg->status}}</td>
             <td>
                        <a class="btn btn-primary" href= "{{route('adminregistratie.edit',[$reg->id])}}">Registreer</a>
                     <button type="submit" class="btn btn-danger">Resultaat</button>
             </td>

         </tr>
     @endforeach
     </table>

</div>



@endsection
