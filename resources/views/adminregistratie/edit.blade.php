@extends('template')
@section('content')
<div class="container">
<div class="jumbotron mt-3">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <div class="pull-left">
            <h2>PCR registratie</h2>
        </div>
    </div>
</div>
<table class="table table-bordered">
         <tr>
             <th>ID-nummer</th>
             <td>{{$prereg->id_nummer}}</td>
             <th>Registratie datum</th>
             <td>{{date("d-m-Y", strtotime($prereg->reg_date))}}</td>
        </tr>
        <tr>
             <th>Naam</th>
             <td>{{$prereg->voornaam}} {{$prereg->achternaam}}</td>
             <th>Adres</th>
             <td>{{$prereg->adress}}</td>
        </tr>
        <tr>
             <th>Geboorte datum</th>
             <td>{{$prereg->geboorte_datum}}</td>
             <th >Telefoon</th>
             <td>{{$prereg->mobiel}}</td>
        </tr>
     </table>

<form action="{{ route('adminregistratie.update',[$prereg->reg_id]) }}" method="POST">
    {{ csrf_field() }}
{{ method_field('PUT') }}
    <div class="form-group row">
       <label for="" class="col-sm-2 col-form-label">Saturatie</label>
         <div class="col-sm-4">
            <input type="text" name ="saturatie" class="form-control" id="" placeholder="">
        </div>
    </div>
    <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Bloeddruk</label>
         <div class="col-sm-2">
            <input type="text" name="bovendruk" class="form-control" id="" placeholder="">
         </div>
         <div class="col-sm-2">
            <input type="text" name="onderdruk" class="form-control" id="" placeholder="">
         </div>
</div>
    <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">Gevaccineerd</label>
         <div class="col-sm-4">
         <select id="" class='form-control' name= "vaxstatus"  onchange="yesnoCheck(this);">
        <option value="">Selecteer status</option>
        <option value="wel">Wel</option>
        <option value="niet">Niet</option>
      </select>
         </div>
         </div>

         <div class="form-group row"  >
         <label id="ifYes" style="display: none;" for="" class="col-sm-2 col-form-label">Dosis</label>
         <div class="col-sm-4">
         <select id="ifYesYes" style="display: none;" class='form-control' name= "vaxdosis" >
        <option value="">Selecteer dosis</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
         </div>
       </div>
       
       <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                <button type="submit" class="btn btn-primary">Swabben</button>
                <a class="btn btn-primary" href="{{route('adminregistratie.index')}}"> Terug</a>
        </div>
      

       </div>
       
    </div>

</form>
</div>
</div>
@endsection