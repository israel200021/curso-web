<?php
    require 'includes/funciones.php';
    incluirTemplate('header',$inicio = true);
?>

    <main class="contenedor seccion">
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

    <section class="seccion contenedor">
        <h2>Casas y Depas en venta</h2>
        <?php
        $limite=3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.hmtml" class="boton-verde">Ver todas</a> 
        </div>
    </section>

    <section class="imagen-contacto">
        <div class="">
            <h2>Encuetra la casa de tus sueños</h2>
            <p>llena el formulaario y un asesor se pondra en contacto contigo a la brevedad</p>
            <div>
                <a href="contacto.hmtml" class="boton-amarillo">Contactanos</a> 
            </div>
        </div>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entreda Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entreda Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>

                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atenciony la
                    la casa que me ofrecieron cumple con todas mis expectativas
                </blockquote>
                <p> Israel Mendoza </p>
            </div>
        </section>
    </div>

<?php
    incluirTemplate('footer');
?>