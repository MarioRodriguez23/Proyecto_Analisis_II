

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseñador Freelancer</title>
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="css/PWstyles.css" as="style">
    <link href="css/PWstyles.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="titulo">Proyecto Universitario UMG <span> Mario Rodríaguez</span></h1>
    </header>

    
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="PWeb_index.php">Inicio</a>
            <a href="#">Nosotros</a>
            <a href="PWeb_Paciente.php">Pacientes</a>
            <a href="index.php">Login</a>
        </nav>
    </div>
    
    
    <section class="hero">
        <div class="contenido-hero">
            <h2>CENTRO MEDICO ASILO DE ANCIANOS CABEZA DE ALGODÓN<span> *Guatemala*</span></h2> 
            <div class="ubicacion">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="88" height="88" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFC107" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <circle cx="12" cy="11" r="3" />
                    <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                </svg>
                <p>Guatemala, Ciudad Guatemala</p>
            </div>
            <a class="boton" href="#">Contactar</a>
        </div> <!-- .contenido-hero --> 
    </section>
    
    <main class="contenedor sombra">
        <h2>Nuestros Servicios</h2>

        <div class="servicios">
            <section class="servicio">
                <h3>Fichas Medicas</h3>
                <div class="iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <path d="M9 14l2 2l4 -4" />
                      </svg>
                </svg>
                </div>
                <p> Pellentesque odio ex, bibendum quis convallis scelerisque, eleifend vitae lectus. Quisque in erat justo. </p>
            </section>
        
            <section class="servicio">
                <h3>Sistema Medico Optimo</h3>
                <div class="iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg>

                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile-message" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M11 3h10v8h-3l-4 2v-2h-3z" />
                        <path d="M15 16v4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h2" />
                        <path d="M10 18v.01" />
                      </svg>
                </div>
                <p> Pellentesque odio ex, bibendum quis convallis scelerisque, eleifend vitae lectus. Quisque in erat justo. </p>
            </section>

            <section class="servicio">
                <h3>Bienestar</h3>
                <div class="iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stethoscope" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1" />
                        <path d="M8 15a6 6 0 1 0 12 0v-3" />
                        <path  d="M11 3v2" />
                        <path  d="M6 3v2" />
                        <circle cx="20" cy="10" r="2" />
                      </svg>
                </div>
                <p> Pellentesque odio ex, bibendum quis convallis scelerisque, eleifend vitae lectus. Quisque in erat justo. </p>
            </section>
        </div> <!--.servicios-->
    
        <section>
            <h2>Contacto</h2>

            <form class="formulario" method="POST" action="">
                <fieldset>
                    <legend>Contactános llenando todos los campos</legend>

                    <div class="contenedor-campos">
                        <div class="campo">
                            <label>Nombre</label>
                            <input name="nombre" class="input-text" type="text" placeholder="Tu Nombre" required="">
                        </div>

                        <div class="campo">
                            <label>Teléfono</label>
                            <input name="telefono" class="input-text" type="tel" placeholder="Tu Teléfono" required="">
                        </div>

                        <div class="campo">
                            <label>Correo</label>
                            <input name="correo" class="input-text" type="email" placeholder="Tu Email" required="">
                        </div>
                
                        <div class="campo">
                            <label>Mensaje</label>
                            <textarea name="mensaje" class="input-text"></textarea>
                        </div>
                    </div> <!-- .contenedor-campos -->

                    <div class="alinear-derecha flex">
                        <input class="boton w-sm-100" type="submit" name="enviar">
                    </div>
                </fieldset>
            </form>
        </section>

    </main>
    
    <footer class="footer">
        <p>Todos los derechos reservados. Mario Rodríguez</p>
    </footer>

    <?php
    include("correo.php");
    ?>


</body>
</html>
