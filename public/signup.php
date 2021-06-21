<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$correo = $_POST['correo'];
		$contraseña = $_POST['contraseña'];
        $telefono = $_POST['telefono'];

		if(!empty($nombre) && !empty($apellidos) && !is_numeric($nombre) && !is_numeric($apellidos) && !empty($correo) && !empty($contraseña) && !empty($telefono)){

			//save to database
			$user_id = random_num(20);
            $tipousuario = 2;
			$query = "insert into persona (user_id, tipousuario, nombre, apellidos, correo,contraseña, telefono) values ('$user_id', '$tipousuario', '$nombre', '$apellidos', '$correo', '$contraseña', $telefono)";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Singup</title>
    <link rel="stylesheet"  href="styles.css">
</head>
<body class="bg-fixed" style="background-image: url(img/back.jpg)">
    <div class="container mx-auto ">
        <div class="flex justify-center px-6 my-8 "></div>
            <!-- url('/img/hero-pattern.svg') -->
            <div class="flex justify-center  bg-white rounded-3xl">

                <div class="w-1/2 bg-cover md:block hidden rounded-l-3xl" style="background-image:  url(img/oso.jpg)"></div>
                <!-- <div class="bg-no-repeat bg-right bg-cover max-w-max max-h-8 h-12 overflow-hidden">
                    <img src="log_in.webp" alt="hey">
                </div> -->


                <div class="md:w-1/2 max-w-lg mx-auto my-12 px-4 py-12 shadow-none">

                    <div class="text-left p-0 font-sans">
                        
                        <h1 class=" text-gray-800 text-4xl font-bold text-center font-body mb-2">Registrate</h1>
                        <p class="border-b-2 border-gray-400 "></p>
                    </div>
                    <form action="signup.php" method="post" class="p-0">
                        <div class="mt-5">

                            <!-- <label for="email" class="sc-bqyKva ePvcBv">Email</label> -->
                            <p class="m-1 font-nunito text-gray-700">Nombre(s)</p>
                            <input type="text" name="nombre" required class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Nombre(s)">
                        </div>
                        <div class="mt-5">
                            <p class="m-1 font-nunito text-gray-700">Apellidos</p>
                            <input type="text" name="apellidos" required class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Apellidos">
                        </div>
                        <div class="mt-5">
                            <p class="m-1 font-nunito text-gray-700">Correo electrónico</p>
                            <input type="email" name="correo" required class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="example@example.com">
                        </div>
                        <div class="mt-5">
                            <p class="m-1 font-nunito text-gray-700">Celular</p>
                            <input type="text" name="telefono" required class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="(55)12345678">
                        </div>
                        <div class="mt-5">
                            <p class="m-1 font-nunito text-gray-700">Contraseña</p>
                            <input type="password" name="contraseña" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent  " placeholder="********">
                        </div>

                        <!--<div class="mt-6 block p-5  md:font-sans text-xs text-gray-800">
                            <input type="checkbox" class="inline-block border-0  ">
                            <span display="inline" class="">By creating an account you are agreeing to our 
                                <a class="" href="/s/terms" target="_blank" data-test="Link">
                                <span class="underline ">Terms and Conditions</span> </a> and
                            <a class="" href="/s/privacy" target="_blank" data-test="Link">
                                <span class="underline">Privacy Policy</span> </a>
                            </span>
                        </div>-->

                        <div class="mt-10">
                            <input type="submit" name="create" value="Continuar" class="py-3 bg-blue-500 text-white w-full rounded hover:bg-blue-600">
                        </div>
                    </form>
                    <a class="font-nunito text-3xl text-blue-600" href="login.php" data-test="Link"><span class="block  p-5 text-center text-gray-800  text-xs ">¿Ya tienes una cuenta?</span></a>
                </div>


            </div>
        </div>    
    </div>
</body>
</html>