<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite('resources/js/app.js')
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myform">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="nombre" aria-describedby="emailHelp">
                            <div id="nombre" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input id="apellido" type="email" class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        // JavaScript usando Fetch API
        document.getElementById('myform').addEventListener('submit', function(e) {
            e.preventDefault();

            let nombre = document.getElementById('nombre').value;
            let apellido = document.getElementById('apellido').value;

            // swal({
            //         title: "¿Estás seguro de guardar estos datos?",
            //         text: "Los siguientes datos se guardaran!",
            //         icon: "info",
            //         buttons: true,
            //         dangerMode: true,
            //     })
            //     .then(async (willDelete) => {
            //         if (willDelete) {
            //             swal("Poof! Your imaginary file has been deleted!", {
            //                 icon: "success",
            //             });
            //             const data = await axios.post('/persona', {
            //                 nombre: nombre,
            //                 apellido: apellido
            //             });
            //             console.log(data.data);
            //             closeModalAndReload();

            //         } else {
            //             swal("Your imaginary file is safe!");
            //         }
            //     });


            swal("¿Quieres guardar estos datos?", {
                    buttons: ["Cancelar", "Aceptar"],
                })
                .then(async (value) => {
                    if (value) {
                        // El usuario hizo clic en "Aceptar"
                        const data = await axios.post('/persona', {
                            nombre: nombre,
                            apellido: apellido
                        });
                        console.log(data.data);
                        closeModalAndReload();
                    } else {
                        // El usuario hizo clic en "Cancelar"
                        console.log("Cancelado");
                    }
                });

        });

        function closeModalAndReload() {
            var myModal = new bootstrap.Modal(document.getElementById(
                'modalForm'));
            myModal.hide();
            location.reload();
        }
    </script>
</body>

</html>
