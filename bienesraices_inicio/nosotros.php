<?php
    include './includes/templates/header.php';
?>

    <main class="contenedor ">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenedor inicio-nosotros">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img src="build/img/nosotros.jpg" alt="anuncio" loading="lazy">
            </picture>
            <div>
                <p class="resaltar">25 Años de Experiencia</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ratione voluptas alias soluta voluptatibus est pariatur doloremque, excepturi beatae obcaecati modi fugit deserunt voluptates placeat impedit illo sequi libero iste.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta veritatis accusantium adipisci dolores ex repudiandae vero! Sequi quae perspiciatis consequatur, a sed ducimus, earum, consequuntur eveniet qui soluta eum id!</p>
            </div>
            
        </div>

        <h1>Mas sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>consectetur adipisicing elit. Fugiat blanditiis vitae animi dolore odit explicabo beatae. Assumenda, sint perferendis in, sequi deleniti iure, aperiam aliquam inventore eos mollitia expedita modi!</p>
            </div>
    
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>consectetur adipisicing elit. Fugiat blanditiis vitae animi dolore odit explicabo beatae. Assumenda, sint perferendis in, sequi deleniti iure, aperiam aliquam inventore eos mollitia expedita modi!</p>
            </div>
    
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>consectetur adipisicing elit. Fugiat blanditiis vitae animi dolore odit explicabo beatae. Assumenda, sint perferendis in, sequi deleniti iure, aperiam aliquam inventore eos mollitia expedita modi!</p>
            </div>
        </div>

    </main>
    


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosostros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
             </nav>
        </div>
        <p class="copyright">Todos los derechos reservados 2021</p>
    </footer>


    <script src="build/js/bundle.min.js"></script>
</body>
</html>