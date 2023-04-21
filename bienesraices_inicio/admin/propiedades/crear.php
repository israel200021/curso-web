<?php
    require '../../includes/funciones.php';
    $auth = estadoAutenticado();
    if (!$auth){
        header('Location: /');
    }   



    //Base de datos

    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    //arreglo con mensajes de errores
    $errores = [];
    $titulo = "";
    $precio = "";
    $descripcion = "";
    $habitaciones = "";
    $wc = "";
    $estacionamiento = "";
    $vendedores_id = "";

    


    //Ejecutar ek codigo despues de que el usuario envia el formulario

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo "<pre>" ;
        // var_dump($_POST);
        // echo "</pre>";
        
        // echo "<pre>" ;
        // var_dump($_FILES);
        // echo "</pre>";
        // exit();
        
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
        $precio = mysqli_real_escape_string($db,$_POST['precio']);
        $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db,$_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
        $vendedores_id = mysqli_real_escape_string($db,$_POST['vendedor']);
        $creado = date("Y-m-d");

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        

        if(!$titulo){
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }

        if( strlen($descripcion) < 50 ){
            $errores[] = "La descripcion es obligtoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "El numero de habitaciones es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El numero de lugares de estacionamientos es obligatorio";
        }

        if(!$wc){
            $errores[] = "El numero de baños es obligatorio";
        }

        if(!$vendedores_id){
            $errores[] = "Elegir un vendedor";
        }

        if(!$imagen["name"] || $imagen['error']){
            $errores[] = "La imagen es obligatoria";
        }

        //Validar por tamaño (100 KB maximo)
        $medida = 1000 * 1000;

        if($imagen["size"] > $medida ){
            $errores[] = "la imagen es muy pesada";
        }
        
        // Revisar el que el arreglo de errores este vacio
        if(empty($errores)) {

            /** SUBIDA DE ARCHIVOS */

            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Subir la imagen 
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            

            //Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio,imagen, descripcion, habitaciones, wc, estacionamiento,creado, vendedores_id) 
            VALUES( '$titulo', '$precio','$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento','$creado', '$vendedores_id')";
            // echo $query;
            $resultado = mysqli_query($db, $query);
            if($resultado){
                // Redireccionar al usuario
                header('Location: /admin?resultado=1');

            }

        }
        
        
        

    }


    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton  boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data" >
            <fieldset>
                <legend>informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">
            
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">
            
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
            
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="EJ: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            
                <label for="wc">Baños</label>
                <input type="number" name="wc" id="wc" placeholder="EJ: 3" min="1" max="9" value="<?php echo $wc; ?>">
            
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="EJ: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>


            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" >
                    <option value="">--Seleccione--</option>
                    <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>
                        <option  <?php echo $vendedores_id === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"> <?php echo $row['nombre'] . " " . $row['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>

<?php
    incluirTemplate('footer');
?>