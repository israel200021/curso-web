<?php
    //Base de datos

    require '../../includes/config/database.php';
    $db = conectarDB();

    //arreglo con mensajes de errores
    $errores = [];
    $titulo = "";
    $precio = "";;
    $descripcion = "";;
    $habitaciones = "";;
    $wc = "";;
    $estacionamiento = "";;
    $vendedores_id = "";;


    //Ejecutar ek codigo despues de que el usuario envia el formulario

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>" ;
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedores_id = $_POST['vendedor'];

        if(!$titutulo){
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

        if(!$venderdor){
            $errores[] = "Elegir un vendedor";
        }

        // Revisar el que el arreglo de errores este vacio
        if(empty($errores)) {
            //Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) 
            VALUES( '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id')";
            echo $query;
            $resultado = mysqli_query($db, $query);
            if($resultado){
                echo "insertado correctamente";
            }

        }
        
        
        

    }


    require '../../includes/funciones.php';
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

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
            <fieldset>
                <legend>informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">
            
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Precio propiedad" alue="<?php echo $precio; ?>>
            
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">
            
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion">alue="<?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="EJ: 3" min="1" max="9" alue="<?php echo $habitaciones; ?>>
            
                <label for="wc">Baños</label>
                <input type="number" name="wc" id="wc" placeholder="EJ: 3" min="1" max="9" alue="<?php echo $wc; ?>>
            
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="EJ: 3" min="1" max="9" alue="<?php echo $estacionamiento; ?>>
            </fieldset>


            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="">
                    <option value="">--Seleccione--</option>
                    <option value="1">Juan</option>
                    <option value="2">Karen</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>

<?php
    incluirTemplate('footer');
?>