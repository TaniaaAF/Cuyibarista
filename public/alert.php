<?php 
    include("connection.php");
        if(isset($_SESSION['alert'])) 
        {?>
            <div class="w-32 h-32 text-white px-6 py-4 border-0 rounded relative mb-4 bg-teal-500">
                <span class="text-xl inline-block mr-5 align-middle">
                    <i class="fas fa-bell"></i>
                </span>
                <span class="inline-block align-middle mr-8">
                    <?= $_SESSION['alert'] ?>
                </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                    <span>×</span>

                </button>
                </div>
<?php }?>