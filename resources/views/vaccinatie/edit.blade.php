@extends('template')
@section('content')
   <div class="jumbotron mt-3">
   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
           <div class="pull-left">
               <h2>Vaccinatie gegevens bijwerken</h2>
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

       <form action="{{ route('vaccinatie.update',$data->vax_id) }}" method="POST">
          @csrf
          @method('PUT')
          @csrf
             <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Voornaam</label>
                  <div class="col-sm-4">
                     <input type="text" name="first_name" class="form-control" value="{{ $data->voornaam }}"/>
                  </div>
                 <label for="inputName" class="col-sm-2 col-form-label">Achternaam</label>
                  <div class="col-sm-4">
                     <input type="text" name="last_name" class="form-control" value="{{ $data->achternaam }}">
                  </div>
             </div>

               <div class="form-group row">
                   <label for="inputBirthDate" class="col-sm-2 col-form-label">Geboorte datum</label>
                   <div class="col-sm-4">
                     <input type="date" name="birth_date" class="form-control" value="{{ $data->geboorte_datum }}">
                   </div>
                   <label for="inputId_nummer" class="col-sm-2 col-form-label">ID-Nummer</label>
                   <div class="col-sm-4">
                      <input type="text" name="id_number" class="form-control" value="{{ $data->id_nummer }}">
                   </div>
               </div>

                <div class="form-group row">
                   <label for="inputMobiel" class="col-sm-2 col-form-label">Mobiel Nummer</label>
                   <div class="col-sm-4">
                     <input type="text" name="mobiel" class="form-control" value="{{ $data->mobiel }}">
                   </div>
                   <label for="inputAdress" class="col-sm-2 col-form-label">Adress</label>
                   <div class="col-sm-4">
                      <input type="text" name="adress" class="form-control" value="{{ $data->adress }}">
                   </div>
               </div>

               <div class="form-group row">
                    <label for="inputManufracture" class="col-sm-2 col-form-label">Manufracture</label>
                        <div class="col-sm-10">
                            <select class="custom-select mr-sm-2" name="manufracturer" id="inlineFormCustomSelect" >
                                <option selected>Choose...</option>
                                <option value="AstraZeneca" <?php if(isset($data->manufracturer) == "AstraZeneca") { echo ' selected="selected"'; } ?>>AstraZeneca</option>
                                <option value="Moderna">Moderna</option>
                                <option value="Pfizer">Pfizer</option>
                                <option value="Sinopharm">Sinopharm</option>
                            </select>
                        </div>
               </div>

                  <div class="form-row mt-4">
                      <div class="form-group col-md-4">
                        <label for="inputLot-Number1">Lot Nummer 1</label>
                        <input type="text" name="lot_number1" class="form-control" value="{{ $data->lot_number1 }}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputDate1">Vaccinatie Datum dose 1</label>
                        <input type="date" name="date1" class="form-control" value="{{ $data->date1 }}">
                      </div>
                      <div class="form-group col-md-4">
                         <label for="inputVaccinator1">Naam Vaccinator 1e dose</label>
                         <input type="text" name="vaccinator1" class="form-control" value="{{ $data->vaccinator1 }}">
                      </div>
                    </div>

                    <div></div>
@if($data->date1 != null)
                     <div class="form-row mt-4">
                         <div class="form-group col-md-4">
                             <label for="inputLot-Number2">Lot Nummer 2</label>
                             <input type="text" name="lot_number2" class="form-control" value="{{ $data->lot_number2 }}">
                         </div>
                         <div class="form-group col-md-4">
                              <label for="inputDate2">Vaccinatie Datum dose 2</label>
                              <input type="date" name="date2" class="form-control" value="{{ $data->date2 }}">
                         </div>
                         <div class="form-group col-md-4">
                              <label for="inputVaccinator2">Naam Vaccinator 2e dose</label>
                              <input type="text" name="vaccinator2" class="form-control" value="{{ $data->vaccinator2 }}">
                         </div>
                     </div>
@endif
@if($data->date2 != null)

                     <div class="form-row mt-4">
                         <div class="form-group col-md-4">
                              <label for="inputLot-Number3">Lot Nummer 3</label>
                              <input type="text" name="lot_number3" class="form-control" value="{{ $data->lot_number3 }}">
                         </div>
                          <div class="form-group col-md-4">
                              <label for="inputDate3">Vaccinatie Datum booster</label>
                              <input type="date" name="date3" class="form-control" value="{{ $data->date3 }}">
                          </div>
                         <div class="form-group col-md-4">
                              <label for="inputVaccinator3">Naam Vaccinator booster</label>
                              <input type="text" name="vaccinator3" class="form-control" value="{{ $data->vaccinator3 }}">
                         </div>
                     </div>
@endif
                     <!-- <div class="form-group row mt-3">
                          <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>

                          <div class="col-sm-10">
                              <select class="custom-select mr-sm-2" name="status" id="inlineFormCustomSelect" >
                                 <option selected>Choose...</option>
                                 <option value="1e Dose">1e Dose</option>
                                 <option value="Vaccinated">2e Dose</option>
                                 <option value="Vaccinated + Booster">Booster</option>
                              </select>
                          </div>

                     </div> -->

                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        <a class="btn btn-primary" href="{{ route('vaccinatie.index') }}"> Terug</a>
                     </div>
      </form>
 </div>
 @endsection
