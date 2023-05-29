<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sitio web del Servicio de Salud Tarapacá">
    <meta name="author" content="Depto TIC - Servicio de Salud Tarapacá">
    <title>Salud Tarapacá</title>

    <!-- Styles -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
          crossorigin="anonymous">
    <link href="css/cu.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
    <link rel="manifest" href="/icon/site.webmanifest">
    <link rel="icon" type="image/vnd.microsoft.icon" href="/icon/favicon.ico">

    <meta name="theme-color" content="#563d7c">

    <style>
        h1 {
            font-family: Sans-serif;
            font-weight: 200;
            color: #006fb3;
            font-size: 2.4rem;
        }

        .gb_azul {
            color: #006fb3;
        }

        .gb_rojo {
            color: #fe6565;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm container bg-nav-gobierno">
    <h5 class="my-0 mr-md-auto font-weight-normal"><img src="images/gob-header.svg" alt="Logo del gobierno de chile">
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="http://www.saludiquique.cl">Web Servicio de Salud</a>
    </nav>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center container">
    <h1 class="display-5 mb-3">Portal de Sistemas - SS Tarapacá</h1>
    <div class="d-flex justify-content-center">
        <table class="align-self-center">
            <tr>
                <td style="background-color: #006fb3;" width="300" height="6"></td>
                <td style="background-color: #fe6565;" width="300" height="6"></td>
            </tr>
        </table>
    </div>
    <p class="text-muted mt-4">Bienvenido al portal de sistemas del Servicio de Salud de Tarapacá.</p>

</div>

<div class="container">
    <div class="card-deck mb-3 text-center">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Portal de Salud</h4>
            </div>
            <div class="card-body">

                <ul class="list-unstyled mt-3 mb-4">
                    <h2>Ciudadanía</h2>
                    <p>Bienvenido al portal de Salud de la Región de Tarapacá. Acá encontrarás la información
                        que esté disponible para ti y la podrás consultar en línea utilizando tu clave única del estado,
                        haciendo click en el botón de abajo.</p>

                </ul>
                <div class="row justify-content-center">
                    <!-- Código para visualizar botón oficial iniciar sesión con ClaveÚnica-->
                    <a class="btn-cu btn-m btn-color-estandar text-center"
                       href="https://uni.saludtarapaca.gob.cl/claveunica"
                       title="Este es el botón Iniciar sesión de ClaveÚnica">
                        <span class="cl-claveunica"></span>
                        <span class="texto">Iniciar sesión</span>
                    </a>
                    <!--./ fin botón-->
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Estado de Urgencias</h4>
            </div>

            <div id="app">
                <p class="text-muted mt-2 mb-2" v-if="loading">Cargando, por favor espere... <i class="fas fa-spinner fa-spin"></i></p>
                <p class="text-muted mt-2 mb-2" v-if="!loading" >Última actualización: {{establishments.updated}}</p>

                <table class="table table-sm" v-if="!loading">
                    <tbody>
                    <tr>
                        <th>Establecimiento</th>
                        <th>En espera</th>
                        <th>En box</th>
                    </tr>
                    <tr v-for="(establishment, index) in establishments.data">
                        <td>{{index}}</td>
                        <td>{{establishment['En espera']}}</td>
                        <td>{{establishment['En box']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow-md">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">
                    <a href="https://portal.saludtarapaca.gob.cl" class="btn btn-secondary btn-block disabled">
                        Portal de sistemas</a>
                </h4>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="https://i.saludtarapaca.gob.cl" class="btn btn-outline-info btn-block">iOnline</a>
                </li>
                <li class="list-group-item">
                    <a href="https://i.saludtarapaca.cl/login/external"
                       class="btn btn-outline-info btn-block">Externos</a>
                </li>
                <li class="list-group-item">
                    <a href="https://neo.saludtarapaca.gob.cl" class="btn btn-outline-info btn-block">NeoSalud</a>
                </li>
                <li class="list-group-item">
                    <a href="https://uni.saludtarapaca.gob.cl" class="btn btn-outline-info btn-block">UniSalud</a>
                </li>
                <li class="list-group-item">
                    <a href="https://esmeralda.saludtarapaca.gob.cl"
                       class="btn btn-outline-info btn-block">Esmeralda</a>
                </li>
                <li class="list-group-item">
                    <a href="https://i.saludtarapaca.gob.cl/claveunica?redirect=L3NpcmVteC9sb2dpbmN1"
                       class="btn btn-outline-info btn-block">Sirmx</a>
                </li>

            </ul>
        </div>


    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="images/logo_sst_100px.png" alt="Logo Servicio de Salud Tarapacá">
            </div>
            <div class="col-6 col-md">
                <h5>Portales del estado</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="http://www.gob.cl">Gobierno de Chile</a></li>
                    <li><a class="text-muted" href="http://www.minsal.cl">Ministerio de Salud</a></li>

                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Servicio de Salud</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="http://www.saludiquique.cl">Web Servicio de Salud Iquique</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Desarrollado por</h5>
                <ul class="list-unstyled text-small">
                    <li>Departamento TIC del SSI</li>
                    <li><a class="text-muted" href="mailto:sistemas.ssi@redsalud.gobc.">sistemas.ssi@redsalud.gob.cl</a>
                    </li>
                    <small class="d-block mb-3 text-muted">2022</small>
                </ul>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.10/vue.min.js"
        integrity="sha512-H8u5mlZT1FD7MRlnUsODppkKyk+VEiCmncej8yZW1k/wUT90OQon0F9DSf/2Qh+7L/5UHd+xTLrMszjHEZc2BA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    new Vue({
        el: "#app",
        data() {
            return {
                establishments: [],
                loading: true,
            }
        },
        mounted: function () {
            axios
                // .get('http://localhost/web-salud/public/functions.php?f=get-rayen-urgency-data')
                .get('https://portal.saludtarapaca.gob.cl/functions.php?f=get-rayen-urgency-data')
                .then(response => {
                    this.establishments = response.data
                })
                .finally(() => this.loading = false)
        }
    })
</script>

</body>

</html>
