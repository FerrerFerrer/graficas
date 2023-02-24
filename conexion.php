<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="jquery/jquery-3.6.3.min.js" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <title>Class led</title>
</head>

<body>
    <h1>Peliculas</h1>
    <!-- <div>
        <table id="datatable">
            <thead>
                <tr>
                    <th>id_pelicula</th>
                    <th>nombre_pelicula</th>
                    <th>director</th>
                    <th>genero</th>
                    <th>fecha_estreno</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result_array as $movie) { ?>
                    <tr>
                        <td><?php echo $movie['id_pelicula'] ?></td>
                        <td><?php echo $movie['nombre_pelicula'] ?></td>
                        <td><?php echo $movie['director'] ?></td>
                        <td><?php echo $movie['genero'] ?></td>
                        <td><?php echo $movie['fecha_estreno'] ?></td>
                    </tr>
                <?php } ?>
            </tbody> 
        </table>
    </div> -->

    <!-- Graficas -->
    <canvas id="grafica"></canvas>
    <!-- Graficas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

<script>
    Accion = 0;
    CF = 0;
    Drama = 0;
    Suspenso = 0;
    // promesa

    let url = "";
    // example
    // 'http://localhost/webClass/datatable/peliculas.php?action=GET_peliculas'
    fetch(url)
        .then(response => response.json())
        .then(data => {
            let tamaño = (Object.keys(data)).length;
            for (let i = 0; i < tamaño; i++) {
                
                if (data[i].genero.includes("Accion")) {
                    Accion++;
                }
                if (data[i].genero.includes("Ciencia ficcion")) {
                    CF++;
                }
                if (data[i].genero.includes("Drama")) {
                    Drama++;
                }
                if (data[i].genero.includes("Suspenso")) {
                    Suspenso++;
                }
            }

            const $grafica = document.getElementById("grafica");

        // Apareceran en la parte inferior
            const etiquetas = ["Accion", "Drama", "Ciencia Ficcion", "Suspenso"];

            const datos = {
                label: "ventas por mes",
                data: [Accion, Drama, CF, Suspenso],
                backgroundcolor: "blue",
                borderColor: "red",
                borderWidth: 1
            };

            // donde renderizar la grafica
            new Chart($grafica, {
                type: 'bar', //tipo de grafica ('bar', 'line')
                data: {
                    labels: etiquetas,
                    datasets: [
                        datos
                        // Aqui mas datos.......
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                benginAtZero: true //para que empieze en valor minimo y no en 0
                            }
                        }],
                    },
                }
            });

        });
</script>

</html>