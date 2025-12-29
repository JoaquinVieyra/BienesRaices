<?php
require "../../includes/funciones.php";
$auth=autenticar();
if (!$auth){
    header("Location: /");
}



$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: /admin");
}
//Arreglo con los errores
$errores = [];
//Base de datos
require "../../includes/config/database.php";
$db = conectarDB();

//OBTENER LA INFO DE LA PROPIEDAD
$query = "SELECT * FROM propiedades WHERE id=$id; ";
$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);


//Obtener vendedores
$consulta = "SELECT * FROM vendedores";
$resultadoVendedores = mysqli_query($db, $consulta);

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$wc = $propiedad['wc'];
$habitaciones = $propiedad['habitaciones'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedor = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //mysqli_real_escape_string SANITIZA LOS DATOS
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedor = mysqli_real_escape_string($db,  $_POST['vendedor'] ?? "");
    $creado = date('Y/m,d');
    //IMAGEN

    $imagen = $_FILES['imagen'];
    if (!$titulo) {
        $errores[] = "Debes poner un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes poner un precio";
    }
    if (!$descripcion || strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
    }
    if (!$wc) {
        $errores[] = "Debes poner la cantidad de baños";
    }
    if (!$habitaciones) {
        $errores[] = "Debes poner la cantidad de habitaciones";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes poner la cantidad de estacionamientos";
    }
    if (!$vendedor) {
        $errores[] = "Debes seleccionar un vendedor";
    }
    //VALIDAR POR TAMAÑO
    $tamaño = 1000 * 100;
    if ($imagen['size'] > $tamaño) {
        $errores[] = "La imagen es muy pesada";
    }

    //insertar en la BASE DE DATOS
    if (empty($errores)) {



        //SUBIDA DE ARCHIVOS
        //CREAR CARPETA
        $carpetaImagenes = "../../imagenes/";
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
            //mkdir CREA LA carpeta de imagenes
        }
        $nombreImagen = '';
        if ($imagen['name']) {
            //eliminar imagen
            unlink($carpetaImagenes . $propiedad['imagen']);
            //GENERAR NOMBRE UNICO DE IMAGEN
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            //SUBIR LA CARPETA
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen=$propiedad['imagen'];
        }


        $query = "UPDATE propiedades SET titulo= '$titulo',precio= '$precio',imagen='$nombreImagen',descripcion='$descripcion',wc= $wc,
        habitaciones= $habitaciones,estacionamiento= $estacionamiento,vendedores_id=$vendedor WHERE id=$id";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header('Location:/admin?mensaje=Propiedad Actualizada Correctamente');
        }
    }
}


incluirTemplate('header') ?>

<main class="seccion contenedor">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton-verdeBlock">Volver</a>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error ?>

        </div>
    <?php } ?>
    <form class="formulario" method="POST" enctype="multipart/form-data"> <!--Enctype es para leer archivos con el form -->
        <fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Nombre de la propiedad" value="<?php echo $titulo ?>">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio de la propiedad" value="<?php echo $precio ?>">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="imagen">
            <img src="/imagenes/<?php echo $imagenPropiedad ?>" alt="imagen" class="imagenChiquita">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>
        <fieldset>
            <legend> Informacion de la propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input value="<?php echo $habitaciones ?>" type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones de la propiedad" min="1" max="9">
            <label for="wc">Baños:</label>
            <input type="number" name="wc" value="<?php echo $wc ?>" id="wc" placeholder="Baños de la propiedad" min="1" max="9">
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" value="<?php echo $estacionamiento ?>" name="estacionamiento" id="estacionamiento" placeholder="Estacionamientos de la propiedad" min="1" max="9">
        </fieldset>
        <fieldset>
            <Legend>Vendedor</Legend>
            <select name="vendedor">
                <option value="" selected disabled>--SELECCIONE--</option>
                <?php while ($row = mysqli_fetch_assoc($resultadoVendedores)) { ?>
                    <option <?php echo $vendedor == $row['id'] ? "selected" : "" ?> value="<?php echo $row['id'] ?>">
                        <?php echo ($row['nombre'] . " " . $row['apellido']); ?>
                    </option>
                <?php } ?>
            </select>
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer')
?>