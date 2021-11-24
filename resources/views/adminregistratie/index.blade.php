@extends('template')
@section('content')
<div class="jumbotron mt-3">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

         <div class="col-lg-12 margin-tb pull-right">
             <div class="">
                 <h2>Registraties overzicht</h2>
             </div>
             <div class="row col-sm-12">

             <input type="text" name="searchregistration" class="form-control col-sm-3 mr-3 " id= "myInput" placeholder="Zoek naam..." onkeyup="searchName();"> 
             <a class="btn btn-success" href= "{{route('adminregistratie.create')}}"  style="float: right;">Nieuwe registratie</a>
             </div>
         </div>
     </div>
     <br>



     <table class="table table-bordered reg-o-table" id = "myTable">
         <tr>
             <th>Registratie datum</th>
             <th>ID-nummer</th>
             <th>Naam</th>
             <th>Telefoon</th>
             <th>Status</th>
             <th colspan = "2">Action</th>
         </tr>
      @foreach($registraties as $reg)
         <tr>
             <td>{{date("d-m-Y", strtotime($reg->reg_date))}}</td>
             <td>{{$reg->id_nummer}}</td>
             <td>{{$reg->voornaam}} {{$reg->achternaam}}</td>
             <td>{{$reg->mobiel}}</td>
             <td>{{$reg->status}}</td>
             <td>
                 @if($reg->status == "preregistratie")
                        <a class="btn btn-primary" href= "{{route('adminregistratie.edit',[$reg->reg_id])}}">Registreer</a>
                        @elseif($reg->status == "geregistreerd")
                        <a class="btn btn-info" href= "{{route('adminregistratie.show',[$reg->reg_id])}}">
                        <i class="bi bi-eye"></i></a>
                        @endif
             </td>
             <td>
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Resultaat
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('result',[$reg->reg_id,'negatief'])}}" onclick="return confirm('Resultaat negatief boeken');">Negatief</a>
                                <a class="dropdown-item" href="{{route('result',[$reg->reg_id,'positief'])}}" onclick="return confirm('Resultaat negatief boeken');">Positief</a>
                            </div>
             </td>

         </tr>
     @endforeach
     </table>

</div>


<script>
    function searchName() {
        // Declare variables 
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
    
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
            } 
        }
    }
    

</script>
@endsection
