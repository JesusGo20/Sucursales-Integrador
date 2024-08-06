<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucursales</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @vite('resources/js/app.js')

</head>

<body>
    <div class="container">
        <main>
            <div class="div-b">
                <div>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalForm">Añadir
                        Sucursal</button>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="verActivasVerInactivas" autocomplete="off"
                        onclick="verActivasVerInactivas()">
                    <label class="form-check-label" for="showInactive">Mostrar Sucursales Inactivas</label>
                </div>
            </div>
            <div>

                <!-- Modal -->
                <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="myform">
                                <div class="modal-header d-flex justify-content-between align-items-center">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese una nueva sucursal
                                    </h1>
                                    <img src="/img/Logo4.png" alt="" style="width: 100px; height: auto;">
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nomSucursal" class="form-label">Nombre de la
                                                sucursal</label>
                                            <input type="text" class="form-control" id="nomSucursal"
                                                placeholder="Nombre de sucursal" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lugar" class="form-label">Lugar de la sucursal</label>
                                            <input id="lugar" type="text" class="form-control"
                                                placeholder="Lugar de la sucursal" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <input id="direccion" type="text" class="form-control"
                                                placeholder="Dirección de la sucursal" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control"
                                                placeholder="Email de la sucursal" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input id="telefono" type="tel" class="form-control" pattern="[0-9]{8}"
                                                placeholder="Número de teléfono" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="whatsApp" class="form-label">WhatsApp</label>
                                            <input id="whatsApp" type="tel" class="form-control" pattern="[0-9]{8}"
                                                placeholder="Número de WhatsApp" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label style="margin-bottom:10px;" for="lang">Especialidades</label>
                                            <select style="width: 225px" name="especialidades[]" id="especialidades"
                                                class="form-control" multiple="multiple" required>
                                                @foreach ($especialidades as $especialidad)
                                                    <option value="{{ $especialidad->id }}">
                                                        {{ $especialidad->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="encargados" class="form-label">Encargado</label>
                                            <select name="opciones" id="encargados" class="form-select" required>
                                                <option selected>Selecciona un encargado</option>
                                                @foreach ($medicos as $medico)
                                                    <option value="{{ $medico->idMedicos }}">{{ $medico->nombre }}
                                                        {{ $medico->apellido1 }} {{ $medico->apellido2 }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="horaApertura" class="form-label">Hora apertura</label>
                                            <input id="horaApertura" type="time" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="horaCierre" class="form-label">Hora cierre</label>
                                            <input id="horaCierre" type="time" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="estados" class="form-label">Estado de
                                                Sucursal</label>
                                            <select name="estado" id="estados" class="form-select">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label">Foto de sucursal</label>
                                            <input id="foto" type="file" class="form-control" required
                                                accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Sucursal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Modal Edit -->
                <div class="modal fade" id="modalFormEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="update-form" enctype="multipart/form-data">
                                <div class="modal-header d-flex justify-content-between align-items-center">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar una sucursal
                                    </h1>
                                    <img src="/img/Logo4.png" alt="" style="width: 100px; height: auto;">
                                </div>

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nomSucursalEdit" class="form-label">Nombre de la
                                                sucursal</label>
                                            <input type="text" class="form-control" id="nomSucursalEdit"
                                                placeholder="Nombre de sucursal">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lugarEdit" class="form-label">Lugar de la sucursal</label>
                                            <input id="lugarEdit" type="text" class="form-control"
                                                placeholder="Lugar de la sucursal">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="direccionEdit" class="form-label">Dirección</label>
                                            <input id="direccionEdit" type="text" class="form-control"
                                                placeholder="Dirección de la sucursal">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="emailEdit" class="form-label">Email</label>
                                            <input id="emailEdit" type="email" class="form-control"
                                                placeholder="Email de la sucursal">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telefonoEdit" class="form-label">Teléfono</label>
                                            <input id="telefonoEdit" type="tel" class="form-control"
                                                pattern="[0-9]{8}" placeholder="Número de teléfono">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">WhatsApp</label>
                                            <input id="whatsAppEdit" type="tel" class="form-control"
                                                pattern="[0-9]{8}" placeholder="Número de WhatsApp" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label style="margin-bottom:10px;" for="lang">Especialidades</label>
                                            <select style="width: 225px; height:70px;" name="especialidades[]"
                                                id="especialidadeseditar" class="form-control select" multiple
                                                required>
                                                @foreach ($especialidades as $especialidad)
                                                    <option class="opcion" value="{{ $especialidad->id }}">
                                                        {{ $especialidad->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="encargadosEdit" class="form-label">Encargado</label>
                                            <select name="opciones" id="encargadosEdit" class="form-select">
                                                <option selected>Selecciona un encargado</option>
                                                @foreach ($medicos as $medico)
                                                    <option value="{{ $medico->idMedicos }}">{{ $medico->nombre }}
                                                        {{ $medico->apellido1 }} {{ $medico->apellido2 }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="horaAperturaEdit" class="form-label">Hora apertura</label>
                                            <input id="horaAperturaEdit" type="time" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="horaCierreEdit" class="form-label">Hora cierre</label>
                                            <input id="horaCierreEdit" type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="estadoEdit" class="form-label">Estado de
                                                Sucursal</label>
                                            <select name="estado" id="estadoEdit" class="form-select">
                                                <option value="1">Activa</option>
                                                <option value="0">Inactiva</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="fotoEdit" class="form-label">Foto de sucursal</label>
                                            <input id="fotoEdit" type="file" class="form-control"
                                                accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <input type="hidden" name="miVariableOculta" id="miVariableOculta"
                                        value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-primary">Guardar Sucursal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#especialidades').select2({
                            dropdownParent: $('#modalForm')
                        });
                        $('#especialidadeseditar').select2({
                            dropdownParent: $('#modalFormEdit')
                        });

                    });


                    document.getElementById('myform').addEventListener('submit', function(e) {
                        e.preventDefault();

                        let formData = new FormData();
                        formData.append('nomSucursal', document.getElementById('nomSucursal').value);
                        formData.append('lugar', document.getElementById('lugar').value);
                        formData.append('direccion', document.getElementById('direccion').value);
                        formData.append('email', document.getElementById('email').value);
                        formData.append('telefono', document.getElementById('telefono').value);
                        formData.append('whatsApp', document.getElementById('whatsApp').value);
                        formData.append('encargado', document.getElementById('encargados').value);
                        formData.append('horaApertura', document.getElementById('horaApertura').value);
                        formData.append('horaCierre', document.getElementById('horaCierre').value);
                        formData.append('estado', document.getElementById('estados').value);
                        formData.append('foto', document.getElementById('foto').files[0]);
                        let especialidadesSelect = document.getElementById('especialidades');
                        let selectedEspecialidades = Array.from(especialidadesSelect.selectedOptions).map(option => option
                            .value);
                        formData.append('especialidades', JSON.stringify(selectedEspecialidades));
                        console.log(JSON.stringify(selectedEspecialidades));
                        Swal.fire({
                            title: '¿Quieres guardar el registro?',
                            showCancelButton: true,
                            confirmButtonText: 'Aceptar',
                            cancelButtonText: 'Cancelar'
                        }).then(async (value) => {
                            if (value) {
                                try {
                                    const config = {
                                        headers: {
                                            Accept: 'application/json',
                                            'Content-Type': 'multipart/form-data'
                                        }
                                    };
                                    const data = await axios.post('/sucursal', formData, config);
                                    Swal.fire('¡Registro Guardado!', '', 'success').then(() => {
                                        closeModalAndReload();
                                    });
                                } catch (error) {
                                    Swal.fire('Error al guardar el registro', error.response.data.message,
                                        'error');
                                }
                            } else {
                                console.log("Cancelado");
                            }
                        });
                    });
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Configurar el token CSRF como header por defecto para todas las solicitudes
                    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
                    axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
                    axios.defaults.headers.patch['Content-Type'] = 'multipart/form-data';

                    document.getElementById("update-form").onsubmit = async function(event) {
                        event.preventDefault();

                        let formData = new FormData();
                        formData.append('nomSucursal', document.getElementById('nomSucursalEdit').value);
                        formData.append('lugar', document.getElementById('lugarEdit').value);
                        formData.append('direccion', document.getElementById('direccionEdit').value);
                        formData.append('email', document.getElementById('emailEdit').value);
                        formData.append('telefono', document.getElementById('telefonoEdit').value);
                        formData.append('whatsApp', document.getElementById('whatsAppEdit').value);
                        formData.append('encargado', document.getElementById('encargadosEdit').value);
                        formData.append('horaApertura', document.getElementById('horaAperturaEdit').value);
                        formData.append('horaCierre', document.getElementById('horaCierreEdit').value);
                        formData.append('estado', document.getElementById('estadoEdit').value);
                        let especialidadesSelect = document.getElementById('especialidadeseditar');
                        let selectedEspecialidades = Array.from(especialidadesSelect.selectedOptions).map(option => option
                            .value);
                        formData.append('especialidades', JSON.stringify(selectedEspecialidades));

                        let foto = document.getElementById('fotoEdit').files[0];
                        if (foto) {
                            formData.append('foto', foto);
                        }

                        let id = document.getElementById('miVariableOculta').value;
                        console.log(id);

                        Swal.fire({
                            title: '¿Quieres actualizar el registro?',
                            showCancelButton: true,
                            confirmButtonText: 'Aceptar',
                            cancelButtonText: 'Cancelar'
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                const url = `/sucursal/${id}`;
                                try {
                                    const response = await axios.post(url, {
                                        ...Object.fromEntries(formData),
                                        _method: 'patch'
                                    }, {
                                        headers: {
                                            Accept: 'application/json',
                                            'Content-Type': 'multipart/form-data',
                                            'X-CSRF-TOKEN': csrfToken
                                        }
                                    });
                                    console.log(response.data);
                                    Swal.fire('¡Registro Actualizado!', '', 'success').then(() => {
                                        closeModalAndReload2();
                                    });
                                } catch (error) {
                                    Swal.fire('Error al actualizar el registro', error.response.data.message,
                                        'error');
                                }
                            }
                        });
                    };

                    function closeModalAndReload() {
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'modalForm'));
                        myModal.hide();
                        location.reload();
                    }

                    function closeModalAndReload2() {
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'modalFormEdit'));
                        myModal.hide();
                        location.reload();
                    }

                    function openModalWithData(objeto) {
                        document.getElementById('nomSucursalEdit').value = objeto.nomSucursal;
                        document.getElementById('lugarEdit').value = objeto.lugar;
                        document.getElementById('direccionEdit').value = objeto.direccion;
                        document.getElementById('emailEdit').value = objeto.email;
                        document.getElementById('telefonoEdit').value = objeto.telefono;
                        document.getElementById('whatsAppEdit').value = objeto.whatsApp;
                        document.getElementById('encargadosEdit').value = objeto.encargado;
                        document.getElementById('horaAperturaEdit').value = objeto.horaApertura;
                        document.getElementById('horaCierreEdit').value = objeto.horaCierre;
                        document.getElementById('estadoEdit').value = objeto.estado;
                        document.getElementById('miVariableOculta').value = objeto.id;


                        const opciones = document.querySelectorAll('.opcion');

                        //Este forEach es para deseleccionar todas las opciones
                        opciones.forEach(opcion => {
                            opcion.selected = false;
                        });

                        //Este forEach es para seleccionar las especialidades que ya tiene la sucursal
                        opciones.forEach(opcion => {
                            if (objeto.especialidades.find(especialidad => especialidad.id == opcion.value)) {
                                opcion.selected = true;
                            }
                        });

                        //Esta linea es para que se actualice el select2
                        $('#especialidadeseditar').trigger('change');

                        var myModal = new bootstrap.Modal(document.getElementById('modalFormEdit'));
                        myModal.show();
                    }

                    function verActivasVerInactivas() {
                        let button = document.getElementById('verActivasVerInactivas');
                        sucursales = document.querySelectorAll('.sucursal');
                        let showActivas = button.textContent.includes('Activas');

                        sucursales.forEach(sucursal => {
                            if (showActivas) {
                                if (sucursal.classList.contains('Inactiva')) {
                                    sucursal.style.display = 'block';
                                } else {
                                    sucursal.style.display = 'none';
                                }
                            } else {
                                if (sucursal.classList.contains('Activa')) {
                                    sucursal.style.display = 'block';
                                } else {
                                    sucursal.style.display = 'none';
                                }
                            }
                        });

                        button.textContent = showActivas ? 'Mostrar Inactivas' : 'Mostrar Activas';
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        verActivasVerInactivas();
                    });
                </script>

                <!-- Mostrar tarjetas -->
                <div class="p-5 table-responsive row gap-4">
                    @foreach ($sucursales as $sucursal)
                        <div class="card sucursal {{ $sucursal->estado == 1 ? 'Activa' : 'Inactiva' }}"
                            style="width: 20rem; ">
                            <img src="data:image/png;base64, {{ $sucursal->foto }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sucursal->nomSucursal }}</h5>
                                <p class="card-text">{{ $sucursal->lugar }}</p>
                                <p class="card-text"><img style="width: 20px; height: 20px;" src="/img/location.png"
                                        alt=""> {{ $sucursal->direccion }}</p>
                                <p class="card-text"><img style="width: 20px; height: 20px;" src="/img/email.png"
                                        alt=""> {{ $sucursal->email }}</p>
                                <p class="card-text"><img style="width: 20px; height: 20px;" src="/img/telephone.png"
                                        alt=""> {{ $sucursal->telefono }}</p>
                                <p class="card-text"><img style="width: 20px; height: 20px;" src="/img/whatsapp.png"
                                        alt=""> {{ $sucursal->whatsApp }}</p>

                                <p class="card-text"><img style="width: 20px; height: 20px;" src="/img/person.png"
                                        alt="">{{ $sucursal->encargados->nombre }}
                                    {{ $sucursal->encargados->apellido1 }} {{ $sucursal->encargados->apellido2 }}
                                <ul>
                                    <li>{{ $sucursal->encargados->telefono }}</li>
                                    <li>{{ $sucursal->encargados->email }}</li>
                                </ul>
                                </p>

                                <p class="card-text"><img style="width: 20px; height: 20px;" src="/img/schedule.png"
                                        alt="">
                                    Lunes-Sabado:{{ $sucursal->horaApertura }}-{{ $sucursal->horaCierre }}</p>

                                <p class="card-text {{ $sucursal->estado ? 'text-success' : 'text-danger' }}">
                                    Sucursal: {{ $sucursal->estado ? 'Activa' : 'Inactiva' }}</p>

                                <label class="card-text">Especialidades de la sucursal</label>
                                <div style="width:265px; height:75px;">
                                    @foreach ($sucursal->especialidades as $especialidad)
                                        <p class="badge bg-primary">{{ $especialidad->nombre }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="">
                                <button style="width: 275px; margin:10px;" type="button" class="btn btn-primary"
                                    onclick="openModalWithData({{ $sucursal }})">Editar Sucursal</button>
                            </div>
                        </div>
                    @endforeach
                </div>

        </main>
        <footer></footer>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<style>
    header {
        background-color: #03a6a6;
        width: auto;
        height: 150px;
        display: grid;
        grid-template-columns: 40% auto 40%;
        grid-template-rows: auto;
        justify-content: space-between;
    }

    img {
        width: 150px;
        height: 150px;
        align-items: center;
    }

    .active {
        color: green;
    }

    .card-body ul li {
        list-style: none;
        /* Elimina los puntos de la lista */
    }

    .div-b {

        display: grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: auto;
        justify-content: space-evenly;
        margin-top: 30px;
        align-items: center;

    }

    .divBuscar {
        display: flex;
        margin-left: 50px;

    }

    .btn {
        background-color: #0098a7;
        color: black;
    }

    .btnBuscar {
        background-color: #0098a7;
    }

    .acomodaTable {
        padding-left: 10px;
        padding-right: 10px;

    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .Inactiva {
        opacity: 0.5;
    }
</style>



</body>

</html>
