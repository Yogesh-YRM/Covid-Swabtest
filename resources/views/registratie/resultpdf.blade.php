<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/custom/stylesheet.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!DOCTYPE html>
<html>

<head>
<!-- <div id = ""> -->

</head>

<body>
    </br>
<div>
    <h2 class="header" style = " text-align: center; font-size: 50px; font-family: Verdana, Geneva, Tahoma, sans-serif;border-bottom:20px solid green;
            text-align: center;";>PCR Resultaat</h2>
</div>
    <div id="" class = "pdf-qr" style = "text-align:center;"><img src="{{asset($result->qr_code)}}"  alt="qrcode"></div>
    

        <table class="table pdf-table">
            <tr>
                <th>Naam:</th>
                <td>{{$result->voornaam}}</td>
                <th>ID-nummer:</th>
                <td>{{$result->id_nummer}}</td>
            </tr>
            <tr>
                <th>Datum Resultaat:</th>
                <td>{{$result->res_date}}</td>
                <th>Resultaat</th>
                <td class="{{$result->result}}-result">{{$result->result}}</td>
            </tr>
    </table>
    <div style = "text-align:center;">
   <p>Dit certificaat is uitgevaardigd door een officiële instantie.</br>
   Team 13 <br>
   Suriname <br>
    Paramaribo<br><br>
   </p>
    </div>
    </div>
    <!-- <div id="editor"></div>
<button id="cmd">Download PDF File</button> -->


    <script>
//    var doc = new jsPDF();
//     var specialElementHandlers = {
//         '#editor': function (element, renderer) {
//             return true;
//         }
//     };

//     $('#cmd').click(function () {
//         doc.fromHTML($('#content').html(), 15, 15, {
//             'width': 170,
//                 'elementHandlers': specialElementHandlers
//         });
//         doc.save('sample-file.pdf');
//     });
    </script>
 

</body>


</html>

