@extends('template')

@section('content')
   <div class="jumbotron mt-3">
   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
           <div class="pull-left">
               <h2>Nieuwe gebruiker vaccineren</h2>
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
      <form action="{{ route('vaccinatie.store') }}" method="POST">
          @csrf
          {{--person form--}}

             <div class="form-group row">
             <label for="inputId_nummer" class="col-sm-2 col-form-label">ID-Nummer</label>
                   <div class="col-sm-4">
                      <input type="text" name="id_number" class="form-control" id="vaxid" placeholder="ID-Nummer" pattern=".{9,}" maxlength ="9" onkeyup="this.value = this.value.toUpperCase();">
                   </div>
                <label for="inputName" class="col-sm-2 col-form-label">Voornaam</label>
                  <div class="col-sm-4">
                     <input type="text" name="first_name" class="form-control" id="inputVoornaam" placeholder="Voornaam">
                  </div>

             </div>

               <div class="form-group row">
               <label for="inputName" class="col-sm-2 col-form-label">Achternaam</label>
                  <div class="col-sm-4">
                     <input type="text" name="last_name" class="form-control" id="inputAchternaam" placeholder="Achternaam">
                  </div>
                   <label for="inputBirthDate" class="col-sm-2 col-form-label">Geboorte datum</label>
                   <div class="col-sm-4">
                     <input type="date" name="birth_date" class="form-control" id="inputBirthDate" placeholder="Geboorte datum">
                   </div>

               </div>

               <div class="form-group row">
                 <label for="inputMobiel" class="col-sm-2 col-form-label">Mobiel nummer</label>
                   <div class="col-sm-4">
                     <input type="text" name="mobiel" class="form-control" id="telefoon" size="100" placeholder="Nummer">
                   </div>
                 <label for="inputAdress" class="col-sm-2 col-form-label">Adress</label>
                   <div class="col-sm-4">
                      <input type="text" name="adress" class="form-control" id="inputAdress" placeholder="Adress">
                   </div>

               </div>

               <div class="form-group row">
                 <label for="inputMail" class="col-sm-2 col-form-label">Email</label>
                   <div class="col-sm-10">
                     <input type="text" name="email" class="form-control" id="inputMail" placeholder="Email">
                   </div>
               </div>


               <div class="form-group row">
                     <label for="inputManufracture" class="col-sm-2 col-form-label">Manufracture</label>
                        <div class="col-sm-10">
                            <select class="custom-select mr-sm-2" name="manufracturer" id="inlineFormCustomSelect" >
                               <option selected>Choose...</option>
                               <option value="AstraZeneca">AstraZeneca</option>
                               <option value="Moderna">Moderna</option>
                               <option value="Pfizer">Pfizer</option>
                               <option value="Sinopharm">Sinopharm</option>
                             </select>
                        </div>
               </div>

                  <div class="form-row mt-4">
                      <div class="form-group col-md-4">
                        <label for="inputLot-Number1">Lot Nummer 1</label>
                        <input type="text" name="lot_number1" class="form-control" id="inputLot-Number1" placeholder="Lot Nummer 1">
                      </div>
                      <?php
                      $today = date('Y-m-d');
                      // dd($today);
                      ?>
                      <div class="form-group col-md-4">
                        <label for="inputDate1">Vaccinatie Datum dose 1</label>
                        <input type="date" name="date1" value="{{$today}}" class="form-control" id="inputDate1" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                         <label for="inputVaccinator1">Naam Vaccinator 1e dose</label>
                         <input type="text" name="vaccinator1" class="form-control" id="inputVaccinator1" placeholder="Naam">
                      </div>
                    </div>

                    <div></div>

                     <!-- <div class="form-row mt-4">
                         <div class="form-group col-md-4">
                             <label for="inputLot-Number2">Lot Nummer 2</label>
                             <input type="text" name="lot_number2" class="form-control" id="inputLot-Number2" placeholder="Lot Nummer 2">
                         </div>
                         <div class="form-group col-md-4">
                              <label for="inputDate2">Vaccinatie Datum dose 2</label>
                              <input type="date" name="date2" class="form-control" id="inputDate2" placeholder="">
                         </div>
                         <div class="form-group col-md-4">
                              <label for="inputVaccinator2">Naam Vaccinator 2e dose</label>
                              <input type="text" name="vaccinator2" class="form-control" id="inputVaccinator2" placeholder="Naam">
                         </div>
                     </div>

                     <div class="form-row mt-4">
                         <div class="form-group col-md-4">
                              <label for="inputLot-Number3">Lot Nummer 3</label>
                              <input type="text" name="lot_number3" class="form-control" id="inputLot-Number3" placeholder="Lot Nummer 3">
                         </div>
                          <div class="form-group col-md-4">
                              <label for="inputDate3">Vaccinatie Datum booster</label>
                              <input type="date" name="date3" class="form-control" id="inputDate3" placeholder="">
                          </div>
                         <div class="form-group col-md-4">
                              <label for="inputVaccinator3">Naam Vaccinator booster</label>
                              <input type="text" name="vaccinator3" class="form-control" id="inputVaccinator3" placeholder="Naam">
                         </div>
                     </div> -->

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
