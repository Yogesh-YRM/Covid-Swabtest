@extends('template')

@section('content')
   <div class="jumbotron mt-3">
   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
           <div class="pull-left">
               <h2>Nieuwe gebruiker toevoegen</h2>
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
                <label for="inputName" class="col-sm-2 col-form-label">Voornaam</label>
                  <div class="col-sm-4">
                     <input type="text" name="first_name" class="form-control" disabled value="{{ $data->first_name }}"/>
                  </div>
                 <label for="inputName" class="col-sm-2 col-form-label">Achternaam</label>
                  <div class="col-sm-4">
                     <input type="text" name="last_name" class="form-control" disabled value="{{ $data->last_name }}">
                  </div>
             </div>

               <div class="form-group row">
                   <label for="inputBirthDate" class="col-sm-2 col-form-label">Geboorte datum</label>
                   <div class="col-sm-4">
                     <input type="date" name="birth_date" class="form-control" disabled value="{{ $data->birth_date }}">
                   </div>
                   <label for="inputId_nummer" class="col-sm-2 col-form-label">ID-Nummer</label>
                   <div class="col-sm-4">
                      <input type="text" name="id_number" class="form-control" disabled value="{{ $data->id_number }}">
                   </div>
               </div>

               <div class="form-group row">
                     <label for="inputManufracturer" class="col-sm-2 col-form-label">Fabrikant</label>
                          <div class="col-sm-4">
                             <input type="text" name="Manufracturer" class="form-control" disabled value="{{ $data->manufracturer }}">
                          </div>
                      <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                           <div class="col-sm-4">
                              <input type="text" name="id_number" class="form-control" disabled value="{{ $data->status }}">
                           </div>
               </div>

                  <div class="form-row mt-4">
                      <div class="form-group col-md-4">
                        <label for="inputLot-Number1">Lot Nummer 1</label>
                        <input type="text" name="lot_number1" class="form-control" disabled value="{{ $data->lot_number1 }}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputDate1">Vaccinatie Datum dose 1</label>
                        <input type="date" name="date1" class="form-control" disabled value="{{ $data->date1 }}">
                      </div>
                      <div class="form-group col-md-4">
                         <label for="inputVaccinator1">Naam Vaccinator 1e dose</label>
                         <input type="text" name="vaccinator1" class="form-control" disabled value="{{ $data->vaccinator1 }}">
                      </div>
                    </div>

                    <div></div>

                     <div class="form-row mt-4">
                         <div class="form-group col-md-4">
                             <label for="inputLot-Number2">Lot Nummer 2</label>
                             <input type="text" name="lot_number2" class="form-control" disabled value="{{ $data->lot_number2 }}">
                         </div>
                         <div class="form-group col-md-4">
                              <label for="inputDate2">Vaccinatie Datum dose 2</label>
                              <input type="date" name="date2" class="form-control" disabled value="{{ $data->date2 }}">
                         </div>
                         <div class="form-group col-md-4">
                              <label for="inputVaccinator2">Naam Vaccinator 2e dose</label>
                              <input type="text" name="vaccinator2" class="form-control" disabled value="{{ $data->vaccinator2 }}">
                         </div>
                     </div>

                     <div class="form-row mt-4">
                         <div class="form-group col-md-4">
                              <label for="inputLot-Number3">Lot Nummer 3</label>
                              <input type="text" name="lot_number3" class="form-control" disabled value="{{ $data->lot_number3 }}">
                         </div>
                          <div class="form-group col-md-4">
                              <label for="inputDate3">Vaccinatie Datum booster</label>
                              <input type="date" name="date3" class="form-control" disabled value="{{ $data->date3 }}">
                          </div>
                         <div class="form-group col-md-4">
                              <label for="inputVaccinator3">Naam Vaccinator booster</label>
                              <input type="text" name="vaccinator3" class="form-control" disabled value="{{ $data->vaccinator3 }}">
                         </div>
                     </div>


                   <div class="row ">
                   <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <img src="{{ asset($data->qr_code) }}"  class="rounded float-center" alt="...">
                   </div>
                   </div>


      </form>

 </div>

 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <a class="btn btn-primary" href="{{ route('vaccinatie.index') }}"> Terug</a>
              </div>
 @endsection
