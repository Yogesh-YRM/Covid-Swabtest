@extends('template')
@section('content')
<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

    <div class="col-lg-12 margin-tb ">
             <div class="">
                 <h2>Resultaten rapportage</h2>
             </div>
             <form method="GET" action="">
        <div class="row col-sm-12">
             <div class="col-sm-3">
                <select id="" class='form-control' name= "resultaatfilter" >
                <option value="">Selecteer resultaat</option>
                <option value="positief">Positief</option>
                <option value="negatief">Negatief</option>
                </select>
            </div>
         <div class="col-sm-3 ">
                <select id="" class='form-control' name= "vaxfilter"  >
                <option value="">Selecteer gevaccineerd</option>
                <option value="wel">Wel</option>
                <option value="niet">Niet</option>
                </select>
            </div>
         <div class="col-sm-3 ">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                    <input type="text" class="form-control pull-right" id="report_result" value="" name="resultdatefilter">
            </div>
         </div>
         
         <div class="form-group col-sm-1">
            <input type="submit" value="Filter" class="btn btn-success " name="resultfilter" />
         </div>
         <div class="form-group col-sm-1">
            <a href="{!! route('resultaatoverzicht') !!}" class="btn btn-success">Clear </a>
        </div>
             </div>
         </div>
</form>
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
