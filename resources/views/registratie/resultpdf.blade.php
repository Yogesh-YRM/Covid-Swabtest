<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!DOCTYPE html>
<html>

<head>
<div id = "content">

</head>

<body>
    </br>

    <h2 class="header" style = " text-align: center; font-size: 50px; font-family: Verdana, Geneva, Tahoma, sans-serif;border-bottom:20px solid green;
            text-align: center;";>PCR Resultaat</h2>

    <div id="" style = "text-align:center;"><img src="generated_qrcodes/FR0015M.png"  alt="qrcode"></div>

        <table class="table ">
            <tr>
                <th>Naam:</th>
                <td>John Doe</td>
                <th>ID-nummer:</th>
                <td>FS340009</td>
            </tr>
            <tr>
                <th>Datum Resultaat:</th>
                <td>10-05-2021</td>
                <th>Resultaat</th>
                <td>Negatief</td>
            </tr>
    </table>
    <div style = "text-align:center;">
   <p>Dit certificaat is uitgevaardigd door een officiële instantie.</br>
   Team 13 <br>
   Suriname <br>
    Paramaribo<br><br>
    <strong>Geldig tot: 20-05-2021</strong>
   </p>
    </div>
    </div>
    <div id="editor"></div>
<button id="cmd">Download PDF File</button>


    <script>
   var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
    </script>
 

</body>


</html>

