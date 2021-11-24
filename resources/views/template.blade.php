<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/custom/stylesheet.css">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

</head>

<body>

    {{-- navbar--}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @guest('admin')
                    <!-- DR removed because user is already at login page -->
                    <!-- <li class="nav-item">
                        <a href="{{ route('admin.login') }}" class="nav-link">Login</a>
                    </li> -->
                    @else
                    @can('role',['admin','editor'])
                    <li class="nav-item">
                        <a href="{{ route('authorizeUsers.index') }}" class="nav-link">Authorized Users</a>
                    </li>
                    @endcan
                     @can('role',['admin','medical'])
                       <li class="nav-item">
                          <a href="{{ route('vaccinatie.index') }}" class="nav-link">Vaccinatie</a>
                       </li>
                       <li class="nav-item">
                           <a href="{{ route('users.index') }}" class="nav-link">Gebruikers</a>
                       </li>
                    @endcan
                    @can('role',['admin','editor'])
                    <li class="nav-item">
                        <a href="{{route('adminregistratie.index')}}" class="nav-link">Geregistreerd</a>
                    </li>
                    @endcan
                    @can('role',['admin','editor'])
                    <li class="nav-item">
                        <a href="{{route('resultaatoverzicht')}}" class="nav-link">Resultaten</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="/authorize/QR-scanner" class="nav-link" >QR Scanner</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">{{ Auth::user()->achternaam }}</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                            <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{-- end navbar--}}

    <div class="container">
        @yield('content')
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>

    <script>


    function yesnoCheck(that) {
    if (that.value == "wel") {
        document.getElementById("ifYes").style.display = "inherit";
        document.getElementById("ifYesYes").style.display = "inherit";
    } else {
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("ifYesYes").style.display = "none";
    }
}
function yesnoCheckcreate(that) {
    if (that.value == "wel") {
        document.getElementById("ifYesYescreate").style.display = "inherit";
        document.getElementById("ifYescreate").style.display = "inherit";
    } else {
        document.getElementById("ifYescreate").style.display = "none";
        document.getElementById("ifYesYescreate").style.display = "none";
    }
}
</script>
<script>
     jQuery(function() {
            $('#report_result').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
                singleDatePicker: false
            });
        });
    </script>
    <script>
    // Vanilla Javascript
    var input = document.querySelector("#telefoon");
    window.intlTelInput(input,({
      // options here
      initialCountry: "sr",
    countryCode:"597",
    }));
    function countryCode() {
       $('#telefoon').val("+597" + $('#telefoon').val());
        }
        window.onload = countryCode;

    $(document).ready(function() {
        $('.iti__flag-container').click(function() {
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone').val("");
          $('#phone').val("+"+countryCode+" "+ $('#phone').val());
       });
    });
  </script>

  <script>
       $(document).ready(function() {
                $('#searchid').on('keyup', function() {
                    var id = $("#searchid").val();
                    $.ajax('{{URL::to('/')}}/authorize/adminregistratie/create/finduser?q='+id, // request url
                        {
                            success: function(data, status, xhr) { // success callback function
                                
                                data = JSON.parse(data);
                                // console.log(data);
                                

                                var voornaam = '';
                                var familienaam = '';
                                var geb_datum = '';
                                var adres = '';
                                var telefoon = '';
                                $.each(data, function(index, val){
                                 voornaam = val.voornaam;
                                 familienaam = val.achternaam;
                                 geb_datum = val.geboorte_datum;
                                 adres = val.adress;
                                 telefoon = val.mobiel;
                                });
                                // console.log(voornaam);

                                $("#voornaam").val(voornaam);
                                $("#familienaam").val(familienaam);
                                $("#geb_datum").val(geb_datum);
                                $("#adres").val(adres);
                                $("#telefoon").val(telefoon);
                               
                            }

                });

            });
        });

        $(function() {
        $('#searchid').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
});
      </script>
      <script>
       $(document).ready(function() {
                $('#vaxid').on('keyup', function() {
                    var id = $("#vaxid").val();
                    $.ajax('{{URL::to('/')}}/authorize/adminregistratie/create/finduser?q='+id, // request url
                        {
                            success: function(data, status, xhr) { // success callback function
                                
                                data = JSON.parse(data);
                                // console.log(data);
                                

                                var voornaam = '';
                                var familienaam = '';
                                var geb_datum = '';
                                var adres = '';
                                var telefoon = '';
                                $.each(data, function(index, val){
                                 voornaam = val.voornaam;
                                 familienaam = val.achternaam;
                                 geb_datum = val.geboorte_datum;
                                 adres = val.adress;
                                 telefoon = val.mobiel;
                                });
                                // console.log(voornaam);

                                $("#inputVoornaam").val(voornaam);
                                $("#inputAchternaam").val(familienaam);
                                $("#inputBirthDate").val(geb_datum);
                                $("#adres").val(adres);
                                $("#telefoon").val(telefoon);
                               
                            }

                });

            });
        });

        $(function() {
        $('#vaxid').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
});
      </script>
</body>

</html>
