<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">


<?php

use Illuminate\Support\Facades\DB;

$location = DB::table('locations')->select('*')->get();
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
          <input type="text" name="firstname" class="form-control" id="" placeholder="">
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
          <input type="text" name="id_number" class="form-control" pattern=".{9,}" maxlength ="9"  id="input1" placeholder="" onkeyup="this.value = this.value.toUpperCase();">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Geboorte datum<r style="color:red;">*</r></label>
        <div class="col-sm-10">
          <input type="date" name="birthdate" class="form-control" id="" placeholder="">
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
          <input type="text" name="phonenumber" class="form-control" size="120" id="phone" placeholder="">
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
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Gewenste swabpost</label>
        <div class="col-sm-10">
          <select id="" class='form-control' name="location">
            <option value="">Selecteer locatie</option>
            @foreach ($location as $loc)
            <option value="{{$loc->id}}">{{$loc->name}}</option>
            @endforeach

          </select>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
<script>
  // Vanilla Javascript
  var input = document.querySelector("#phone");
  window.intlTelInput(input, ({
    // options here
    initialCountry: "sr",
    countryCode:"597",
  }));
  function countryCode() {
       $('#phone').val("+597" + $('#phone').val());
        }
        window.onload = countryCode;
  
  
  $(document).ready(function() {
    $('.iti__flag-container').click(function() {
      var countryCode = $('.iti__selected-flag').attr('title');
      var countryCode = countryCode.replace(/[^0-9]/g, '')
      $('#phone').val("");
      $('#phone').val("+" + countryCode + $('#phone').val());
    });
  });

  $(function() {
        $('#input1').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
});
</script>

</div>