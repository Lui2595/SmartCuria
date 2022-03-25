<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whitelist</title>
    <?php include "inc/styles.php";?>
    <style>
         @font-face {
            font-family: Mont-Heavy;
            src: url("fonts/Mont-Heavy.otf") format("opentype");
        }
        @font-face {
            font-family: Myriad;
            src: url("fonts/MyriadVariableConcept-Roman.otf") format("opentype");
        }

        @font-face {
            font-family: Roboto-M;
            src: url("fonts/Roboto-Medium.ttf");
        }
        @font-face {
            font-family: Roboto-R;
            src: url("fonts/Roboto-Regular.ttf");
        }
        .color-curia{
             color:#FF4D05 !important;
         }
         .white{
             color: white;
         }
         .blue {
             color: rgb(11,43,90,1);
         }
         .roboto{
             font-family: Roboto-R;
         }
         .robotom{
             font-family: Roboto-M;
         }
         .mont{
            font-family: Mont-Heavy;
         }
         .myrad{
            font-family: Myriad;
            font-weight: bold !important;
         }
         .redes{
             position: sticky;
             position: -webkit-sticky;
             bottom: 0px;
             background-image: url("images/links/fondo.png");
             background-size: cover;
         }
        @media (max-width: 991.98px) {
            .logo-lg{
                display: none;
            }
        }
        body,html{
            height: 100%;
        }
        .new-nav{
            margin-bottom:5px;
            margin-top:5px; 
            display:flex; 
            align-items: baseline
        }
        @media(max-width: 992 px){
            .new-nav{
            display: none;
            }
        }

        .new-nav-links{
            font-family: Roboto-M;
            font-size: 12pt;
            color: white;
            margin-left: 1.5vw;
        }
        .btn-lite{
            font-family: Myriad;
            font-size: 17pt;
            color: #FF4D05 !important;
            margin-left:3vw;
            font-weight: bold;
        }
        .foot-link{
            height: 22px;
            margin-left: 20px;
        }
        .preloader{
                position:sticky;
                top:0px;
                background:white;
                z-index: 11;
                height: 100vh;
            }
            .disabled-link {
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="preloader" style="background-color:  rgb(11,43,90,1);">
            <div class="d-flex justify-content-center align-items-center h-100" role="status">
                <!-- <span class="sr-only">Loading...</span> -->
                <img src="images/preloader.gif" alt="" srcset="" >
            </div>
    </div>
        <div  style="height: 100%;"> 
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky1 ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
                <img src="images/logo.png" alt="" height="70px" srcset="" style=" position:relative;left:50%;transform: translateX(-50%);">
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">

				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <img src="images/logo.png" alt="" height="55px" class="logo-lg" >

			</div>
            <a href="#" class="btn-custom" id="btn-login" >Login</a>
		</div>
	</nav> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky1 ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
            <div class="new-nav d-none d-lg-block" >
                   <a href="index_es.php"> <img class="img-fluid" src="images/logo.png" style="width: 8vw;margin-right:5vw" alt="" ></a>
                    <span style="position: absolute; right: 15vw; top:25%">
                    <a href="#"  id="btn-login2" ><img height="40px" src="images/login-white.png"   onmouseover="this.src='images/login-orang.png'" onmouseout="this.src='images/login-white.png'"></a>
                    <a href="whitelist.php" class="new-nav-links" style="margin-left: 20px;">EN</a> | <a href="whitelist_es.php" style="margin-left: 0px;" class="new-nav-links">ES</a>
                    </span>
            </div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse ajuste "  id="ftco-nav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a href="index_es.php#home" class="nav-link">Home</a></li>

				</ul>
				<a href="#"  id="btn-login" ><img height="40px" src="images/login-white.png"   onmouseover="this.src='images/login-orang.png'" onmouseout="this.src='images/login-white.png'"></a>
                <a href="whitelist.php" class="new-nav-links" style="margin-left: 20px;">EN</a> | <a href="whitelist_es.php" style="margin-left: 0px;" class="new-nav-links">ES</a>
			</div>
		</div>
        
	</nav>


    <section class="" id="" style="height:90vh; background-image: url('images/bg-whitelist.png'); background-size:cover;background-position:center">
            <div class="mx-5 px-5 h-100">
                <div class="row d-flex content-aling-center h-100">
                   
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="images/ROOMW.png" alt="" class="img-fluid h-95">
                    </div>
                    <div class="col-md-6 d-flex ">
                        <div class="row justify-content-center mb-4 pt-md-4" style="align-content: center;">
                            <div class="col-md-10 heading-section ftco-animate " style="color:black">
                                <span class="subheading">ROOMS</span>
                                <h2 class="mb-4 myrad blue">WHITELIST</h2>
                                <div class="d-flex about robotom">
                                  
                                    <h3>Se de los primeros en poder entrar a esta nueva etapa del las inversiones digitales, 
                                        con información única y la posibilidad de poder platicar con los integrantes
                                         de Curia en primera mano, sin mencionar las sorpresas y ventajas que tendrás en esta etapa.</h3>

                                </div>
                                
                                <ul style="list-style-type: none;" class="robotom">
                                    <li><i class="bi bi-check2-circle"></i> Acceso anticipado a la Presale</li>
                                    <li><i class="bi bi-check2-circle"></i> NFT exclusivo al participar en la Presale</li>
                                    <li><i class="bi bi-check2-circle"></i> Rango especial en el canal de discord</li>
                                    <li><i class="bi bi-check2-circle"></i> Mandar mensaje privado a los devs</li>
                                </ul>
                                <span class="robotom"> Donadores actuales:</span> <span class="robotom" id="Espacios"></span>
                                    </br>
                                    <div class="text-center mt-4">
                                    <a href="#" id="Donar" class="disabled-link"><img height="40px" id="donar_img" src="images/whitelisted-gray.png"   onmouseover="this.src='images/whitelisted-orange.png'" onmouseout="this.src='images/whitelisted-blue.png'"></a>   
                                    </div>
                                <!-- <button class="btn btn-primary" >Donar</button> -->
                                <span id="isWhitelisted" class="robotom color-curia" style="font-size: 20px;"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </section>
        <section class="py-1 top redes ">
                    <div class="row justify-content-center justify-content-lg-between" >
                        <div class="d-lg-flex d-none align-items-center ml-md-5 " >
                            <p style="font-family: Mont-Heavy; color: white;font-size: 18px; margin-bottom: 0px;">SMART CURIA</p>
                        </div>
                        <div class="d-flex mr-md-5 ">
                            <div class="d-flex align-items-center">
                                <p style="font-family: Myriad; color: white;font-size: 16px; margin-bottom: 0px;padding-top: 5px;   font-weight: bold;">FOLLOW US</p>
                            </div>
                            <div class="d-flex align-items-center">
                               <p class="mb-0 d-flex">
                                <a href="https://www.facebook.com/Smart-Curia-104643822151230" target="_blank" ><img class="foot-link" src="images/links/FacebookOrange.png"  onmouseover="this.src='images/links/FacbeookWhite.png'" onmouseout="this.src='images/links/FacebookOrange.png'"></a>
                                <a href="https://twitter.com/SmartCuria" target="_blank" ><img class="foot-link" src="images/links/TwitterOrange.png"  onmouseover="this.src='images/links/TwitterWhite.png'" onmouseout="this.src='images/links/TwitterOrange.png'"></a>
                                <a href="https://t.me/smartcuria" target="_blank" ><img class="foot-link" src="images/links/TelegramOrange.png"  onmouseover="this.src='images/links/TelegramWhite.png'" onmouseout="this.src='images/links/TelegramOrange.png'"></a>
                                <a href="https://discord.gg/KaeCcyPA" target="_blank" ><img class="foot-link" src="images/links/DisordOrange.png"  onmouseover="this.src='images/links/DiscordWhite.png'" onmouseout="this.src='images/links/DisordOrange.png'"></a>
                                <a href="https://www.youtube.com/channel/UCYZi4RsuBObCev1wrMQSv8Q" target="_blank" ><img class="foot-link" src="images/links/YoutubeOrange.png"  onmouseover="this.src='images/links/YoutubeWhite.png'" onmouseout="this.src='images/links/YoutubeOrange.png'"></a>
                                </p> 
                            </div>
                                                      
                        </div>
                        <!-- <div class="col-sm-12 col-md-6 col-lg-7 d-flex topper align-items-center text-lg-right justify-content-end">
                            <p class="mb-0 register-link"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Inquire Now</a></p>
                        </div> -->
                    </div>
        </section>




        <!-- Modal  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title p-2" id="exampleModalLabel">¡Alerta!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <span id="mensaje_modal">

                    </span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php include "inc/scripts.php";?>
    <script src='https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js'></script>
    <script src='https://unpkg.com/moralis@0.0.184/dist/moralis.js'></script>
    <script type='text/javascript' src='web3/whitelisto.js'></script>

        <script type="text/javascript">
            function myFunction(x) {
            if (x.matches) { // If media query matches
               
                $("#ftco-nav").attr("style","")
                console.log($(".ajuste"))
            } else {
                $("#ftco-nav").attr("style","display:none !important")
               
                console.log($(".ajuste"))
            }
            }

            var x = window.matchMedia("(max-width: 991.98px)")
            myFunction(x) // Call listener function at run time
            x.addListener(myFunction)
            
            $( window ).on( "load", function() {
                scrollBottom();
                setTimeout(
                function() 
                {
                    $(".preloader").hide();
                }, 800);
        	})
        </script>

</body>
</html>