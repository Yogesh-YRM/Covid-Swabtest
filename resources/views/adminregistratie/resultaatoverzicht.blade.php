@extends('template')
@section('content')
<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb pull-right">
             <div class="">
                 <h2>Resultaten rapportage</h2>
             </div>
             <div class="row col-sm-12">

             <input type="text" name="searchregistration" class="form-control col-sm-3 mr-3 " id= "myInput" placeholder="Zoek naam..." onkeyup="searchName();"> 
             <a class="btn btn-success" href= "{{route('adminregistratie.create')}}"  style="float: right;">Nieuwe registratie</a>
             </div>
         </div>
     </div>
     <br>



     <table class="table table-bordered" id = "myTable">
         <tr>
             <th>Datum resultaat</th>
             <th>ID-nummer</th>
             <th>Naam</th>
             <th>Telefoon</th>
             <th>Resultaat</th>
             <th colspan = "2">Action</th>
         </tr>
      @foreach($resultaten as $res)
         <tr>
             <td>{{date("d-m-Y", strtotime($res->created_at))}}</td>
             <td>{{$res->id_number}}</td>
             <td>{{$res->firstname}} {{$res->lastname}}</td>
             <td>{{$res->phonenumber}}</td>
             <td><c @if ($res->result =="positief")style = "color:red;" @elseif ($res->result == "negatief") style = "color:green;" @endif>{{$res->result}}</c></td>
             <td>
             <a class="btn btn-success" href= "{{route('adminregistratie.show',[$res->id])}}"><i class="fas fa-eye"></i>Bezichtigen</a>
             </td>
         </tr>
     @endforeach
     </table>

</div>
@endsection
