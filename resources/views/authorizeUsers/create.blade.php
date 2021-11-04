<!-- create.blade.php -->
@extends('template')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Games Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form action="" method="post">
          @csrf
          <div class="form-group row">
             <label for="inputName" class="col-sm-2 col-form-label">Name</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" placeholder="Name">
               </div>
          </div>

           <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-10">
                 <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
               </div>
             </div>
             <div class="form-group row">
               <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
               <div class="col-sm-10">
                 <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
               </div>
             </div>
             <fieldset class="form-group">
               <div class="row">
                 <legend class="col-form-label col-sm-2 pt-0">Roles</legend>
                 <div class="col-sm-10">
                   <div class="form-check">
                     <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                     <label class="form-check-label" for="gridRadios1">
                       admin
                     </label>
                   </div>
                   <div class="form-check">
                     <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                     <label class="form-check-label" for="gridRadios2">
                       medical
                     </label>
                   </div>
                   <div class="form-check disabled">
                     <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                     <label class="form-check-label" for="gridRadios3">
                       editor
                     </label>
                   </div>
                 </div>
               </div>
             </fieldset>

             </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a class="btn btn-primary" href="{{ route('admin.manageAdmins.adminCrud') }}"> Back</a>
              </div>
          </div>

      </form>
  </div>
</div>
@endsection
