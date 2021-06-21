<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $sql = "SELECT DISTINCT Catalogo FROM producto";
    $cons=mysqli_query($con,$sql);
    if(!$cons)
        echo 'Query failesdfsfd';

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
                        <!--BARRA DE MENÚ PARA JS-->
                        <div class="flex justify-between items-center">
                            <div class="px-4 w-full cursor-pointer" id="burger">
                                <div class="flex justify-between items-center">
                                    <h1 class="font-bold uppercase text-3xl text-left font-body">
                                        <a href="/" class="text-white">Barista</a>
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
                               <a href="menu.php?id=<?php echo 'inicio'?>"  class="px-4 flex justify-end border-r-4 border-white">
                                   <span>Menu</span>
                                   <svg class="w-5 -my-4 ml-2" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools-kitchen-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                       <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
                                   </svg>
                               </a>
                           </li>
                           <li class="text-white py-1">
                               <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                   <span>Contact</span>
                                   <svg class="w-5 ml-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
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
                                echo'<a href="logout.php" class="btn text-primary my-2 ml-2 border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Log out</a>';	

                            }else{
                                echo'<a href="login.php" class="btn text-primary border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500" >Log in</a>';
                                echo'<a href="signup.php" class="btn text-primary ml-2 border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Sign up</a>';					
                            }
                        ?>
                    </div>
                </nav>
            </div> <!--end nav-->
        </div>
        <!--------------------------------------------------------------    MENU    -------------------------------------------------------------------------->
        <main>
            <div class="xl:mx-32 bg-white md:grid xl:grid-cols-5 pb-3">
                     <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                    <div class="xl:items-left md:flex flex-col md:align-center md:col-span-1">
                        <div @click.away="open = false" class="md:sticky md:top-3 md:bg-milk rounded-md flex flex-col w-full md:w-64 md:m-8 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
                            <div class="flex-shrink-0  py-4 flex flex-row  justify-around">
                                <a href="menu.php?id=<?php echo 'inicio'?>" class="text-lg  font-semibold w-1/2 items-start tracking-widest font-body text-left text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Menu :)</a>
                                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <nav :class="{'block': open, 'hidden': !open}" class=" flex-grow md:block h-1/3 px-4 pb-4 mb-3 md:pb-0 md:overflow-y-auto">
                            <?php
                                    while($categoria = mysqli_fetch_assoc($cons)){
                             ?>
                                <a class="font-body block px-4 py-2 mt-2 text-2xl font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="menu.php?id=<?php echo $categoria['Catalogo']?>"><?php echo $categoria['Catalogo'] ?></a>
                            <?php } ?>
                            </nav>
                        </div>
                    </div>
                    <div class="block md:col-end-4 xl:col-span-4 gap-10 my-8 mx-12 px-3 xl:grid xl:grid-cols-4">
                        <?php
                                $id = $_GET['id'];
                                if($id == 'inicio'){
                                    $query = "SELECT * FROM producto"; 
                                }else
                                    $query = "SELECT * FROM producto WHERE Catalogo = '$id'";
                                $res = mysqli_query($con,$query);
                                
                                while($row = mysqli_fetch_array( $res )){ 
                                    
                        ?>            
                            <!-------------------------------------------------------CARD--------------->
                            <div class="rounded bg-white border-gray-200 shadow-md overflow-hidden relative"> 
                                <img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" alt="stew" class="h-32 sm:h-48 w-full object-cover">
                                <div class="m-4">   
                                    <span class="font-bold"><?php echo $row['Nombre'] ?></span>
                                    <span class="block text-gray-500 text-sm"><?php echo $row['Descripcion'] ?></span>
                                </div>
                                <div class="">
                                    <div class="card">
                                        <span><?php echo $row['TiempoPreparacion'] ?>minutos</span>
                                        
                                    </div>
                                    <div class="absolute top-0 right-2 pl-2 ml-2 mt-2 p-2 bg-gray-700 text-white text-xs uppercase font-bold rounded-full">
                                        <span>PRECIO: $<?php echo $row['Precio'] ?></span>
                                    </div>
                                </div>

                                <div class="mb-2 ml-3 flex">
                                    <span class="font-nunito font-medium py-3"></span>
                                    <a href="carrito.php?id=<?php echo $row['idProducto']?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full"> Agregar al carrito </a>
                                </div>
                                
                            </div>
                        <?php } ?>
                    </div>
            </div>
        </main>
        <script src="script.js"></script>
    </body>
</html>