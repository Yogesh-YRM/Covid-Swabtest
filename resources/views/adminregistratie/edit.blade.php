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

<form action="{{ route('preregister') }}" method="POST">
    @csrf
    <div class="form-group row">
       <label for="" class="col-sm-2 col-form-label">Voornaam<r style="color:red;">*</r></label>
         <div class="col-sm-10">
            <input type="text" name ="firstname" class="form-control" id="" placeholder="">
         </div>
    </div>
    <div class="form-group row">
       <label for="" class="col-sm-2 col-form-label">Familienaam<r style="color:red;">*</r></label>
         <div class="col-sm-10">
            <input type="text" name="lastname" class="form-control" id="" placeholder="">
         </div>
    </div>
    <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">ID-Nummer<r style="color:red;">*</r></label>
         <div class="col-sm-10">
           <input type="text" name="id_number" class="form-control" id="" placeholder="">
         </div>
       </div>
       <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">Adres<r style="color:red;">*</r></label>
         <div class="col-sm-10">
           <input type="text" name="adress" class="form-control" id="" placeholder="">
         </div>
       </div>
     <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">Telefoon<r style="color:red;">*</r></label>
         <div class="col-sm-10">
           <input type="text" name="phonenumber" class="form-control" id="" placeholder="">
         </div>
       </div>
       <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">E-mail</label>
         <div class="col-sm-10">
           <input type="email" name="email" class="form-control" id="" placeholder="">
         </div>
       </div>
       <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">Symptomen</label>
         <div class="col-sm-10">
           <textarea type="text" name="symptoms" class="form-control" id="" placeholder=""></textarea>
         </div>
       </div>
       
      

       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-4">
                <button type="submit" class="btn btn-primary">Versturen</button>
                <a class="btn btn-primary" href="#"> Terug</a>
        </div>
    </div>

</form>
</div>
</div>
@endsection