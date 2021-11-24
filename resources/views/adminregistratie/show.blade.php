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
<?php

$bp = json_decode($reg->bp);
$vax = json_decode($reg->vax);

?>
<table class="table table-bordered">
         <tr>
             <th>ID-nummer</th>
             <td>{{$reg->id_nummer}}</td>
             <th>Registratie datum</th>
             <td>{{date("d-m-Y", strtotime($reg->reg_date))}}</td>
        </tr>
        <tr>
             <th>Naam</th>
             <td>{{$reg->voornaam}} {{$reg->achternaam}}</td>
             <th>Adres</th>
             <td>{{$reg->adress}}</td>
        </tr>
        <tr>
             <th>Geboorte datum</th>
             <td>{{$reg->geboorte_datum}}</td>
             <th >Telefoon</th>
             <td>{{$reg->mobiel}}</td>
        </tr>
        <tr>
             <th>Saturatie</th>
             <td>{{$reg->saturation}}</td>
             <th >Bloeddruk</th>
             <td>Bovendruk {{$bp[0]}} Onderdruk {{$bp[1]}}</td>
        </tr>
        <tr>
             <th>Gevacccineerd</th>
             <td>{{$vax[0]}} @if($vax[1]!= null)Dosis {{$vax[1]}}@endif</td>
             <th >Resultaat</th>
             <td>{{$reg->result}}</td>
        </tr>
     </table>
     <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                
                <a class="btn btn-primary" href="{{route('adminregistratie.index')}}"> Terug</a>
        </div>

</div>
</div>
@endsection