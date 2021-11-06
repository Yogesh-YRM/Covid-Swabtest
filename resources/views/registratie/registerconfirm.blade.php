<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
use Illuminate\Support\Facades\DB;
$location = DB:: table('locations')->select('*')->get();
?>
    <div class="container">
<div class="jumbotron mt-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="pull-left">
                <h2>PCR pre-registratie</h2>
            </div>
        </div>
    </div>


         <div class="alert alert-success">
             <p>U hebt zich succesvol geregistreerd!<br>
             U dient zich vandaag aan te melden op uw aangegeven locatie.<br>
            Onderstaand formulier geeft uw ingevulde informatie aan.
</p>
         </div>

         <table class="table table-bordered">
         <tr>
    <th>Datum registratie</th>
    <td>{{date("d-m-Y", strtotime($registratie->created_at))}}</td>
  </tr>
         <tr>
    <th>Voornaam</th>
    <td>{{$registratie->firstname}}</td>
  </tr>
  <tr>
    <th>Familienaam</th>
    <td>{{$registratie->lastname}}</td>
  </tr>
  <tr>
    <th>Geboorte datum</th>
    <td>{{$registratie->birthdate}}</td>
  </tr>
  <tr>
    <th>ID-nummer</th>
    <td>{{$registratie->id_number}}</td>
  </tr>
  <tr>
    <th>Adres</th>
    <td>{{$registratie->adress}}</td>
  </tr>
  <tr>
    <th>Telefoon</th>
    <td>{{$registratie->phonenumber}}</td>
  </tr>
  <tr>
    <th>E-mail</th>
    <td>5{{$registratie->email}}</td>
  </tr>
  <tr>
    <th>Swablocatie</th>
    <td>{{$registratie->loc}}</td>
  </tr>
  <tr>
    <th>Symptomen</th>
    <td>{{$registratie->opmerking}}</td>
  </tr>
</table>
<div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                
                <a class="btn btn-primary" href="javascript:close_window();"> OK</a>
        </div>

  
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <script>
        function close_window() {
            window.location.replace("http://bogsuriname.com");
}
        </script>
</div>
