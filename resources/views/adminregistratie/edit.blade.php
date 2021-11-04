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
             <td>FS230000</td>
             <th>Registratie datum</th>
             <td>5-11-2021</td>
        </tr>
        <tr>
             <th>Naam</th>
             <td>Shivan Bhagwandin</td>
             <th>Adres</th>
             <td>Lelydorp</td>
        </tr>
        <tr>
             <th>Geboorte datum</th>
             <td>09-19-2000</td>
             <th >Telefoon</th>
             <td>8920264</td>
        </tr>
     </table>

<form action="{{ route('preregister') }}" method="POST">
    @csrf
    <div class="form-group row">
       <label for="" class="col-sm-2 col-form-label">Saturatie</label>
         <div class="col-sm-4">
            <input type="text" name ="firstname" class="form-control" id="" placeholder="">
        </div>
    </div>
    <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Bloeddruk</label>
         <div class="col-sm-2">
            <input type="text" name="lastname" class="form-control" id="" placeholder="">
         </div>
         <div class="col-sm-2">
            <input type="text" name="lastname" class="form-control" id="" placeholder="">
         </div>
</div>
    <div class="form-group row">
         <label for="" class="col-sm-2 col-form-label">Gevaccineerd</label>
         <div class="col-sm-4">
         <select id="" class='form-control' name= "location"  onchange="yesnoCheck(this);">
        <option value="">Selecteer status</option>
        <option value="wel">Wel</option>
        <option value="niet">Niet</option>
      </select>
         </div>
         </div>

         <div class="form-group row" id="ifYes" style="display: none;">
         <label for="" class="col-sm-2 col-form-label">Dosis</label>
         <div class="col-sm-4">
         <select id="" class='form-control' name= "location" >
        <option value="">Selecteer status</option>
        <option value="wel">1</option>
        <option value="niet">2</option>
        <option value="wel">3</option>
      </select>
         </div>
       </div>
       
       
      

       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-4">
                <button type="submit" class="btn btn-primary">Swabben</button>
                <a class="btn btn-primary" href="#"> Terug</a>
        </div>
    </div>

</form>
</div>
</div>
@endsection