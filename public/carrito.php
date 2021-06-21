<?php 
    session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    if(isset($_SESSION['carrito'])){
        echo 'if 1';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $arreglo = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            for($i=0; $i<count($arreglo); $i++){
                echo $arreglo[$i]['idProducto'];
                if($arreglo[$i]['idProducto'] == $_GET['id']){
                    $encontro = true;
                    $numero = $i;
                }
            }
            if($encontro == true){
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito'] = $arreglo;
            }else{
                $nombre  ="";
                $precio ="";
                $imagen ="";
                $query = "SELECT * FROM producto WHERE idProducto = $id";
                $res = mysqli_query($con, $query);
                $fila = mysqli_fetch_row($res);
                $nombre = $fila[1];
                $precio = $fila[3];
                $imagen = $fila[7];
                $arregloNuevo[]= array(
                    'idProducto' => $id,
                    'Nombre' => $nombre,
                    'Precio' => $precio,
                    'imagen' => $imagen,
                    'Cantidad' => 1
                ); array_push($arreglo,$arregloNuevo);
                $_SESSION['carrito'] = $arreglo;
            }
        }
    }else{
        echo 'else';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM producto WHERE idProducto = $id";
            $res = mysqli_query($con, $query);
            $fila = mysqli_fetch_row($res);
            $nombre = $fila[1];
            $precio = $fila[3];
            $imagen = $fila[7];
            $arregloUno[] = array(
                'idProducto' => $id,
                'Nombre' => $nombre,
                'Precio' => $precio,
                'imagen' =>  $imagen,
                'Cantidad' => 1
            );
            $_SESSION['carrito'] = $arregloUno;
        }
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet"  href="styles.css">
</head>
<body class="bg-fixed" style="background-image: url(img/back.jpg)">
    <!-----------------------------------------------------------------------------DIVISOR PARA LOS MARGENES LATERALES----------------------------------------------->
    <div class="md:ml-32 md:mr-32 ">
        <div class="md:flex">
            <nav class=" w-full md:flex justify-around">
                <!--------------------------------NOMBRE Y BARRA DE MENÚ----------------------->
                <div class="flex justify-between items-center">
                           
                    <!--BARRA DE MENÚ PARA JS-->
                    <div class="px-4 w-full cursor-pointer">
                        <div class="flex justify-between items-center">
                            <h1 class="font-bold uppercase text-3xl text-left font-body">
                                <a href="index.php" class="text-white">Barista</a>
                            </h1>
                            <!--BARRA DE MENÚ PARA JS-->
                            <div class="px-4 cursor-pointer md:hidden" id="burger">
                                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="4" y1="6" x2="20" y2="6" />
                                    <line x1="4" y1="12" x2="20" y2="12" />
                                    <line x1="4" y1="18" x2="20" y2="18" />
                                  </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-------------------------------------------------------------------------->
                <ul class="text-sm mt-6 hidden md:flex" id="menu">
                    <li class="text-white font-bold py-1">
                        <a href="index.php" class="px-4 flex justify-end border-r-4 border-primary">
                            <span>Home</span>
                            <svg class="w-5 ml-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                        </a>
                    </li>
                    <li class=" text-white py-1">
                        <a href="menu.php?id=<?php echo 'inicio'?>" class="px-4 flex justify-end border-r-4 border-white">
                            <span>Menu</span>
                            <svg class="w-5 -my-4 ml-2" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools-kitchen-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
                            </svg>
                        </a>
                    </li>
                    <li class="text-white py-1">
                        <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                            <span class="badge">Carrito</span>
                            <svg class="w-5 -my-4 ml-2"  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="6" cy="19" r="2" />
                                <circle cx="17" cy="19" r="2" />
                                <path d="M17 17h-11v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <!--LOGIN Y SIGN UP-->
                <div class="flex justify-center md:justify-end m-4">
					<?php
						if(isset($_SESSION['user_id'])){

							echo'<p class="font-body py-3 mx-4 text-lg text-white ">Hola,';
							echo $user_data['nombre'];
							echo' </p>';
							echo'<a href="logout.php" class="btn text-primary border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500" >Log out</a>';

						}else{
							echo'<a href="login.php" class="btn text-primary border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500" >Log in</a>';
                    		echo'<a href="signup.php" class="btn text-primary ml-2 border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Sign up</a>';					
						}
					?>
                </div>
            </nav>
        </div> <!--end nav-->
        <div class="mx-32 bg-white">
            <div class="py-12">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
                    <div class="md:flex ">
                        <div class="w-full p-4 px-5 py-5">
                            <div class="md:grid md:grid-cols-3 gap-2 ">
                                <div class="col-span-2 p-5">
                                    <h1 class="text-3xl font-body font-2xl ">Tus artículos:</h1>
                                    <?php
                                        if(isset($_SESSION['carrito'])){
                                            $arregloCarrito = $_SESSION['carrito'];
                                            for($i=0; $i<count($arregloCarrito); $i++){
                                                echo $i;
                                                
                                    ?>
                                        <!--ARTICULO EJEMPLO-->
                                        <div class="flex justify-between items-center mt-6 pt-6">
                                            <div class="flex items-center"> <img src="data:image/jpg;base64, <?php echo base64_encode($arregloCarrito[$i]['imagen']); ?>" width="60" class="rounded-full ">
                                                <div class="flex flex-col ml-3"> <span class="md:text-md font-medium"><?php echo $arregloCarrito[$i]['Nombre'];?></span> <span class="text-xs font-light text-gray-400">#<?php echo $arregloCarrito[$i]['idProducto'];?></span> </div>
                                            </div>
                                            <div class="flex justify-center items-center">
                                                <div class="flex flex-wrap">
                                                    <div class="flex w-1/5">
                                                        <input type="text" value="<?php echo $arregloCarrito[$i]['Cantidad'];?>"
                                                        class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 rounded-l-md w-full">
                                                    </div>
                                                    <div class="flex flex-col w-4/12">
                                                        <button
                                                        class="text-white text-center text-md font-semibold rounded-tr-md px-1 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                        +
                                                        </button>
                                                        <button
                                                        class="text-white text-center text-md font-semibold rounded-br-md px-1 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                        -
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="pr-8 "> <span class="text-md font-medium">$<?php echo $arregloCarrito[$i]['Precio'];?></span> </div>
                                                <div> <i class="fa fa-close text-xs font-medium"></i> </div>
                                            </div>
                                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <circle cx="12" cy="12" r="9" />
                                                <line x1="9" y1="12" x2="15" y2="12" />
                                            </svg>
                                        </div>                                
                                    <?php } }?>
                                    <!--FINAL EJEMPLO-->
                                    <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                        <div class="flex items-center"> <i class="fa fa-arrow-left text-sm pr-2"></i> <span class="text-md font-medium text-blue-500">Continua comprando</span> </div>
                                        <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1">Subtotal:</span> <span class="text-lg font-bold text-gray-800 "> $24.90</span> </div>
                                    </div>
                                </div>
                                <div class=" p-5 bg-gray-800 rounded grid justify-center align-middle overflow-visible text-center"> <span class="text-3xl font-body text-gray-100 block pb-3">Tu saldo es de:</span> 
                                    <span class="text-3xl text-center font-bold text-gray-400 ">$20.50</span>
                                    <button class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">Pagar :)</button>
                                    <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                                        ¿Saldo insuficiente? Realiza una recarga.
                                    </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="script.js"></script>
</body>
</html>