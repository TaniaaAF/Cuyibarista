<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

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
                        <a href="menu.php?id=<?php echo 'inicio'?>"  class="px-4 flex justify-end border-r-4 border-white">
                            <span>Menu</span>
                            <svg class="w-5 -my-4 ml-2" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools-kitchen-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
                            </svg>
                        </a>
                    </li>
                    <li class="text-white py-1">
                        <a href="carrito.php" class="px-4 flex justify-end border-r-4 border-white">
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
        <!--BARRA DE ANUNCIOS-->
        <div class="bg-image-none slide-contenedor" style="height: 720px;"> 
            <div class="miSlider fade">
                <div class="w-full shadow-2xl overflow-hidden relative">
                    <img  class="absolute inset-0 h-full w-full object-cover" src="img/1(1).png" alt="">
                    <div class="absolute inset-0 bg-gray-700 bg-opacity-75"></div>
                    <div class="flex h-full items-center justify-center relative">
                        <div class="sm:px-8 block">
                            <h1 class="ml-5 uppercase sm:text-center font-pangolin text-7xl text-bold text-white">   Somos Pet Friendly</h1>
                            <span class="sm:px-6 sm:text-center font-nunito text-xl text-bold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce molestie.</span>
                        </div>
                    </div>
                    <div class="flex h-full place-items-start justify-center relative">
                    </div>
                </div>
            </div>
            <div class="miSlider fade">
                <div class="w-full shadow-2xl overflow-hidden relative">
                    <img  class="absolute inset-0 h-full w-full object-cover" src="img/1(2).jpg" alt="">
                    <div class="absolute inset-0 bg-gray-700 bg-opacity-75"></div>
                    <div class="flex h-full items-center justify-center relative">
                        <div class="sm:px-8 block">
                            <h1 class="ml-5 uppercase sm:text-center font-pangolin text-7xl text-bold text-white">   Somos Pet Friendly</h1>
                            <span class="sm:px-6 sm:text-center font-nunito text-xl text-bold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce molestie.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="miSlider fade">
                <div class="w-full shadow-2xl overflow-hidden relative">
                    <img  class="absolute inset-0 h-full w-full object-cover" src="img/1(3).png" alt="">
                    <div class="absolute inset-0 bg-gray-700 bg-opacity-75"></div>
                    <div class="flex h-full items-center justify-center relative">
                        <div class="sm:px-8 block">
                            <h1 class="ml-5 uppercase sm:text-center font-pangolin text-7xl text-bold text-white">   Somos Pet Friendly</h1>
                            <span class="sm:px-6 sm:text-center font-nunito text-xl text-bold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce molestie.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="direcciones">
                <a href="#" class="atras" onclick="avanzaSlide(-1)">
                    <svg class=" m-4 w-10" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <a href="#" class="adelante" onclick="avanzaSlide(1)">
                    <svg class=" m-4 w-10" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            <div class="barras">
                <span class="barra active" onclick="posicionSlide(1)"></span>
                <span class="barra" onclick="posicionSlide(2)"></span>
                <span class="barra" onclick="posicionSlide(3)"></span>
            </div>
        </div>
        <!------------------------------------------------------------ WHAT HAPPENS HERE----------------------------------------------------------------------->
        <div class="block bg-white w-full pb-12">
            <div class="flex align-top justify-center relative">
                <div class="mt-12 block">
                    <h1 class=" my-12 font-serifpro text-center text-2xl md:text-4xl text-bold text-cuaternary ">What Happens Here</h1>
                    <span class="mt-4 font-pangolin uppercase text-center text-3xl md:text-6xl text-bold text-cinco">Coffee build your base.</span>
                </div>
            </div>
        </div>
            <div class="w-full align-top bg-white flex justify-around">

                <img src="img/coffee.png" alt="">
            </div>

    <script src="script.js"></script>
</body>
</html>