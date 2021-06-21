<?php
    include("connection.php");

	if(isset($_POST['agregar']))
	{
		//something was posted
		$Nombre = $_POST['Nombre'];
        $Descripcion = $_POST['Descripcion'];
        $Precio = $_POST['Precio'];
        $TiempoPreparacion = $_POST['TiempoPreparacion'];
        $Catalogo = $_POST['Catalogo'];
        $Unidades = $_POST['Unidades'];
        $imagen = $_POST['imagen'];

        $query = "INSERT INTO producto(Nombre, Descripcion, Precio, TiempoPreparacion, Catalogo, Unidades, imagen ) VALUES ('$Nombre', '$Descripcion', '$Precio', '$TiempoPreparacion', '$Catalogo', '$Unidades', '$imagen')";
        $result = mysqli_query($con,$query);   
            $_SESSION['alert'] = "holsgsgsgwgrea";
            header("Location:admincatalogo.php");
	}
?>

            <!-- FORMULARIO -------------------------------------------------------------------------->
            
    <div class="container w-full">
        <div class="w-full">
            <div  class="hidden conten w-full h-full mb-10 bg-black bg-opacity-70 absolute top-0  justify-center items-center rounded-xl "> 
                <?php include("alert.php"); ?>        
                <div class="w-3/5  ">
                    <form class="w-full" action="add.php" method="post">
                        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-3/5  ">
                            <div class="flex justify-center py-4">
                                    <div class="flex  rounded-full md:p-4 p-2 border-2">
                                        <img class="w-6" src="img/foodicon.png" alt="">
                                    </div>
                            </div>

                            <div class="flex justify-center">
                                <div class="flex">
                                    <h1 class="text-gray-600 font-body font-bold md:text-2xl text-xl"><strong> Agregar producto</strong></h1>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                                <input type="text" name="Nombre" required  class=" text-black py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" placeholder="Nombre" />
                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Descripción</label>
                                <input type="text" name="Descripcion"  required class="text-black py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" placeholder="Descripción" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Precio</label>
                                    <input type="number" name="Precio" required class="text-black py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="number" placeholder="Precio" />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Unidades disponibles</label>
                                        <input name="Unidades" required  class="text-black py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Unidades" />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiempo de Preparacion</label>
                                    <input name="TiempoPreparacion"  required  class="text-black py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Unidades" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Categoría</label>
                                <select name="Catalogo"  required class="text-black py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                    <option>Postres</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Inserta una imagen de tu producto</label>
                                    <div class='flex items-center justify-center w-full'>
                                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                            <div class='flex flex-col items-center justify-center pt-7'>
                                                <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <p class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider'>Selecciona una imagen</p>
                                            </div>
                                            <input name="imagen" required type='file' class="hidden" />
                                        </label>
                                    </div>
                            </div>

                            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                                <a href="#"  class="cerrar w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">Cancel</a> 
                                <input type="submit" name="agregar"  class="bt w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2" value="Agregar"></a> 
                            </div>

                        </div>
                    </form>
                </div>
            </div>          
        </div>   
    </div>