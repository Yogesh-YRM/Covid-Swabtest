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

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('adminregistratie.store') }}" method="POST">
    @csrf
    <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">ID-Nummer<r style="color:red;">*</r></label>
         <div class="col-sm-4">
          <input type="text" name="id_number" class="form-control" pattern=".{9,}" maxlength ="9"  id="searchid" placeholder="" onkeyup="this.value = this.value.toUpperCase();">
         </div>
       <label for="" class="col-sm-2 col-form-label">Voornaam<r style="color:red;">*</r></label>
         <div class="col-sm-4">
            <input type="text" name ="firstname" id="voornaam" class="form-control" id="" placeholder="">
         </div>
    </div>
    <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Familienaam<r style="color:red;">*</r></label>
         <div class="col-sm-4">
            <input type="text" name="lastname" id="familienaam" class="form-control" id="" placeholder="">
         </div>
         <label for="" class="col-sm-2 col-form-label">Geboorte datum<r style="color:red;">*</r></label>
         <div class="col-sm-4">
           <input type="date" name="birthdate" id = "geb_datum" class="form-control" id="" placeholder="">
         </div>
       </div>
       <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">Adres<r style="color:red;">*</r></label>
         <div class="col-sm-4">
           <input type="text" name="adress" class="form-control" id="adres" placeholder="">
         </div>
         <label for="" class="col-sm-2 col-form-label">Telefoon<r style="color:red;">*</r></label>
         <div class="col-sm-4">
           <input type="text" name="phonenumber" class="form-control" id="telefoon" placeholder="">
         </div>
       </div>
       <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">E-mail</label>
         <div class="col-sm-4">
           <input type="email" name="email" class="form-control" id="" placeholder="">
         </div>
         <label for="" class="col-sm-2 col-form-label">Gevaccineerd</label>
         <div class="col-sm-4">
         <select id="" class='form-control' name= "vaxstatus"  onchange="yesnoCheckcreate(this);">
        <option value="">Selecteer status</option>
        <option value="wel">Wel</option>
        <option value="niet">Niet</option>
      </select>
         </div> 
       </div>
       <div class="form-group row">
       <label for="" class="col-sm-2 col-form-label">Saturatie</label>
         <div class="col-sm-4">
            <input type="text" name ="saturatie" class="form-control" id="" placeholder="">
        </div>
        <label id="ifYescreate" style="display: none;" for="" class="col-sm-2 col-form-label">Dosis</label>
         <div class="col-sm-4">
         <select id="ifYesYescreate" style="display: none;" class='form-control' name= "vaxdosis" >
        <option value="">Selecteer dosis</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
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
    <label for="" class="col-sm-2 col-form-label">Symptomen</label>
         <div class="col-sm-4">
           <textarea type="text" name="symptoms" class="form-control" id="" placeholder=""></textarea>
         </div>
</div>
       
       
      

       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-4">
                <button type="submit" class="btn btn-primary">Registreren</button>
                <a class="btn btn-primary" href="{{route('adminregistratie.index')}}"> Terug</a>
        </div>
    </div>


</form>
</div>
</div>
@endsection
