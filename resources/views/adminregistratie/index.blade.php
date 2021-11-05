@extends('template')
@section('content')
<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Registraties overzicht</h2>
             </div>
             <div class="row">
             <input type="text" name="searchregistration" class="form-control col-sm-9 mr-3" id="" placeholder="">
             <a class="btn btn-success col-sm-2 pull-right" style="" href="">Search</a>
             </div>
         </div>
     </div>
     <br>



     <table class="table table-bordered">
         <tr>
             <th>Registratie datum</th>
             <th>ID-nummer</th>
             <th>Naam</th>
             <th>Telefoon</th>
             <th>Status</th>
             <th colspan = "2">Action</th>
         </tr>
      @foreach($registraties as $reg)
         <tr>
             <td>{{date("d-m-Y", strtotime($reg->created_at))}}</td>
             <td>{{$reg->id_number}}</td>
             <td>{{$reg->firstname}} {{$reg->lastname}}</td>
             <td>{{$reg->phonenumber}}</td>
             <td>{{$reg->status}}</td>
             <td>
                 @if($reg->status == "preregistratie")
                        <a class="btn btn-primary" href= "{{route('adminregistratie.edit',[$reg->id])}}">Registreer</a>
                        @elseif($reg->status == "geregistreerd")
                        <a class="btn btn-primary" href= "{{route('adminregistratie.edit',[$reg->id])}}">Bezichtigen</a>
                        @endif
             </td>
             <td>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Resultaat
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('result',[$reg->id,'negatief'])}}">Negatief</a>
                                <a class="dropdown-item" href="{{route('result',[$reg->id,'positief'])}}">Positief</a>
                            </div>
             </td>

         </tr>
     @endforeach
     </table>

</div>



@endsection
