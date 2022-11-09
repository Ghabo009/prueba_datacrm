<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div id="contenido">
        <h1>Contenido</h1>
        <table id="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>contact_no</th>
                    <th>lastname</th>
                    <th>createdtime</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>

    </div>
    <button onclick="cargarDatos()">Cargar datos</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function cargarDatos() {
            <?php
            //SessionName
            $sessionName = $challenges->getSessionName();
            ?>

            var sessionName = "<?php echo $sessionName; ?>";
            //imprimir en consola el sessionName
            console.log(sessionName);

            //peticion GET3. query https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName={{sessionName}}&query=select * from Contacts;
            $.get("https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName=" + sessionName + "&query=select * from Contacts;", function(data, status) {
                //imprimir en consola la respuesta
                console.log(data);
                //obtener datos
                var datos = data.result;
                //imprimir en consola los datos
                console.log(datos);
                //construir filas de tabla
                var html = "";
                for (var i = 0; i < datos.length; i++) {
                    html += "<tr>";
                    html += "<td>" + datos[i].id + "</td>";
                    html += "<td>" + datos[i].contact_no + "</td>";
                    html += "<td>" + datos[i].lastname + "</td>";
                    html += "<td>" + datos[i].createdtime + "</td>";
                    html += "</tr>";
                }
                $("#tbody").html(html);

            });

        }
    </script>

</body>

</html>