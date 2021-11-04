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


    <form action="{{ route('authorizeUsers.update',$data->id) }}" method="POST">
        @csrf
        @method('PUT')

         @csrf
          <div class="form-group row">
              <label for="inputVoornaam" class="col-sm-2 col-form-label">Voornaam</label>
                 <div class="col-sm-10">
                   <input type="text" name="voornaam" class="form-control"  value="{{ $data->voornaam }}"/>
                 </div>
           </div>

            <div class="form-group row">
               <label for="inputAchternaam" class="col-sm-2 col-form-label">Achternaam</label>
                 <div class="col-sm-10">
                 <input type="text" name="achternaam" class="form-control"  value="{{ $data->achternaam }}"/>
                 </div>
            </div>

             <div class="form-group row">
                 <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                 <div class="col-sm-10">
                   <input type="email" name="email" class="form-control" value="{{ $data->email }}"/>
                 </div>
               </div>
               <div class="form-group row">
                 <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                 <div class="col-sm-10">
                   <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                 </div>
               </div>
               <fieldset class="form-group">
                 <div class="row">
                   <legend class="col-form-label col-sm-2 pt-0">Rol</legend>
                   <div class="col-sm-10">
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="role" value="{{ $data->role }}"/>
                       <label class="form-check-label" for="gridRadios1">
                         admin
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="role"  value="{{ $data->role }}"/>
                       <label class="form-check-label" for="gridRadios2">
                         medical
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="role"  value="{{ $data->role }}"/>
                       <label class="form-check-label" for="gridRadios3">
                         editor
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="role"  value="{{ $data->role }}"/>
                       <label class="form-check-label" for="gridRadios3">
                         scanner
                       </label>
                     </div>
                   </div>
                 </div>
               </fieldset>

               </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        <a class="btn btn-primary" href="{{ route('authorizeUsers.index') }}"> Terug</a>
                </div>
            </div>



    </form>
@endsection
