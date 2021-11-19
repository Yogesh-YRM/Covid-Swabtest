@extends('template')

@section('content')
   <div class="jumbotron mt-3">
   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
           <div class="pull-left">
               <h2>Gebruiker Informatie</h2>
           </div>
       </div>
   </div>

   @if ($errors->any())
       <div class="alert alert-danger">
           <strong>Whoops!</strong> Er is een probleem met de ingevulde velden.<br><br>
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
      <form>
       @csrf
                   <div class="form-group row">
                      <label for="inputVoornaam" class="col-sm-2 col-form-label">Voornaam</label>
                        <div class="col-sm-4">
                           <input type="text" name="voornaam" class="form-control" id="inputVoornaam" disabled value="{{ $data->voornaam }}">
                        </div>
                       <label for="inputAchternaam" class="col-sm-2 col-form-label">Achternaam</label>
                        <div class="col-sm-4">
                           <input type="text" name="achternaam" class="form-control" id="inputAchternaam" disabled value="{{ $data->achternaam }}">
                        </div>
                   </div>

                     <div class="form-group row">
                         <label for="inputBirthDate" class="col-sm-2 col-form-label">Geboorte datum</label>
                         <div class="col-sm-4">
                           <input type="date" name="geboorte_datum" class="form-control" id="inputBirthDate" disabled value="{{ $data->geboorte_datum }}">
                         </div>
                         <label for="inputId-nummer" class="col-sm-2 col-form-label">ID-Nummer</label>
                         <div class="col-sm-4">
                            <input type="text" name="id_nummer" class="form-control" id="inputId-nummer" disabled value="{{ $data->id_nummer }}">
                         </div>
                     </div>

                     <div class="form-group row">
                           <label for="inputAdress" class="col-sm-2 col-form-label">Adress</label>
                              <div class="col-sm-10">
                                 <input type="text" name="adress" class="form-control" id="inputAdress" disabled value="{{ $data->adress }}">
                              </div>
                     </div>

                     <div class="form-group row">
                           <label for="inputMobiel" class="col-sm-2 col-form-label">Mobiel nummer</label>
                           <div class="col-sm-10">
                              <input type="text" name="mobiel" class="form-control" id="inputMobiel" disabled value="{{ $data->mobiel }}">
                           </div>
                      </div>

                      <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input type="email" name="email" class="form-control" id="inputEmail" disabled value="{{ $data->email }}">
                           </div>
                      </div>



                   <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <a class="btn btn-primary" href="{{ route('users.index') }}"> Terug</a>
                   </div>

      </form>

 </div>
 @endsection
