<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smart Curia</title>
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

         .elevador{
            position: fixed;
            top: 45%;
            bottom: 55%;
            right: 10%;
            width: 50px;
            z-index: 10;
         }
         .elevador-text{
           font-weight: bold;
           font-family: Myriad;
           color: white;
           text-align: center;
           font-size: 20px;
         }
         @media (max-width: 991.98px) {
            .elevador{
                right: 5%;
            }
         }
         .color-curia{
             color:#FF4D05 !important;
         }
         .white{
             color: white;
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
         .preloader{
                position:sticky;
                top:0px;
                background:white;
                z-index: 11;
                height: 100vh;
            }
        .spinner{
            position:absolute;
            left: 0;
            right: 0;
           top: 0;
           bottom: 0;

        }
        .featurestitle{
            color: #fc5e28 !important;
            font-size: 18px;
        }
        .featurestext{
            color: black !important;
            font-size: 12px;
        }
        .carouselOfImages{
        position: relative;
        margin: auto;
        overflow: visible;
        width: 100%;
        }
        .gradient-left{
        display: block;
        position: relative;
        background-image: linear-gradient(to right, whitesmoke, transparent 100%);
            margin-top: -270px;
        height: 150px;
        width: 8%;
        content: '';
        }
        .gradient-right{
        display: block;
        position: relative;
        float: right;
        right:0;
        background-image: linear-gradient(to left, whitesmoke, transparent 100%);
            margin-top: -150px;
        height: 150px;
        width:8%;
        content: '';
        }

.carouselImage {
    position: relative;
    width: 25vw;
    height: 70vh;
    margin-right: 33px;
    margin-top: 0px;
    margin-bottom: 50px;
    counter-increment: carousel-cell;
    text-align: center;
    vertical-align: center;
    transition: transform 0.5s;
    font-size: 1.2em;
  }
@media only screen and (max-width: 1300px){
    .carouselImage{
        width: 50vw;
        padding: 0px;
        
    }
    
}
@media only screen and (max-width: 773px){
    .carouselImage{
        width: 75vw;
        padding: 0px;
            }

}
@media only screen and (max-width: 490px){
    .carouselImage{
        width: 85vw;
        padding: 0px;
            }

}


.carouselImage.is-selected {


color:#00ADEE;
  z-index:10;
  transform: scale(1);
}
.carouselImage.nextToSelectedLeft, .carouselImage.nextToSelectedRight {
  transform: scale(1);
  z-index:5;
}

/*! Flickity v2.0.5
https://flickity.metafizzy.co
---------------------------------------------- */

.flickity-enabled {
  position: relative;
}

/* .flickity-enabled:focus { outline: none; } */

.flickity-viewport {
  overflow: hidden;
  position: relative;
  height: 60vh;
}

.flickity-slider {
  position: absolute;
  width: 100%;
  height: 100%;
}

/* draggable */

.flickity-enabled.is-draggable {
  -webkit-tap-highlight-color: transparent;
/*           tap-highlight-color: transparent; */
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.flickity-enabled.is-draggable .flickity-viewport {
  cursor: move;
  cursor: -webkit-grab;
  cursor: grab;
}

.flickity-enabled.is-draggable .flickity-viewport.is-pointer-down {
  cursor: -webkit-grabbing;
  cursor: grabbing;
}
.flickity-viewport {
    margin: 0px;
    width: 100%;
    margin-bottom: 100px;
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
.img-carousel{
    height: 70vh;
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
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky1 ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
            <div class="new-nav d-none d-lg-block" >
                   <a href="#home"> <img class="img-fluid" src="images/logo.png" style="width: 7vw;margin-right:4vw" alt="" ></a>
                    <a class="new-nav-links" href="#descripcion" class="nav-link">Curia</a>
                    <a class="new-nav-links" href="#features" class="nav-link">Features</a>
					<a class="new-nav-links" href="#whitelist" class="nav-link">Whitelist</a>
                    <a class="new-nav-links" href="#roadmap" class="nav-link">RoadMap</a>
                    <a class="new-nav-links" href="#nft" class="nav-link">NFT</a>
					<a class="new-nav-links" href="#economia" class="nav-link">Economy</a>
					<a class="new-nav-links" href="#equipo" class="nav-link">Team</a>
                    <a  href="#" onclick="whitepaper(event)" class="btn-lite">WHITEPAPER</a>
                    <a href="index.php" class="new-nav-links" style="margin-left: 20px;">EN</a> | <a href="index_es.php" style="margin-left: 0px;" class="new-nav-links">ES</a>
            </div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse ajuste"  id="ftco-nav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="#descripcion" class="nav-link">Curia</a></li>
                    <li class="nav-item"><a href="#features" class="nav-link">Features</a></li>
					<li class="nav-item"><a href="#whitelist" class="nav-link">Whitelist</a></li>
                    <li class="nav-item"><a href="#roadmap" class="nav-link">RoadMap</a></li>
                    <li class="nav-item"><a href="#nft" class="nav-link">NFT</a></li>
					<li class="nav-item"><a href="#economia" class="nav-link">Economy</a></li>
					<li class="nav-item"><a href="#equipo" class="nav-link">Team</a></li>
				</ul>
				<a href="#" onclick="whitepaper(event)">WHITEPAPER</a>
                <a href="index.php" class="new-nav-links" style="margin-left: 20px;">EN</a> | <a href="index_es.php" style="margin-left: 0px;" class="new-nav-links">ES</a>
			</div>
		</div>
        
	</nav>

    <div class="elevador">
        <a href="#home"  id="subir"  > <img class="img-fluid mb-3" src="images/Arriba.png" alt=""  srcset=""></a> </br>
        <p class="elevador-text" id="subir_t">Up</p>
        <p class="elevador-text" id="bajar_t">Down</p>
        <a href="#home"  id="bajar" ><img class="img-fluid" src="images/Abajo.png" alt="" srcset=""></a>

    </div>
        <!-- our team -->
        <section class="ftco-section section" id="equipo" style=" background-image: url('images/bg9.jpg'); background-size:cover;background-position:center">
                <div class="container">
                    <div class="row justify-content-center pt-5">
                        <div class="col-md-7 text-center heading-section ftco-animate mb-3">
                            <h2 class="mb-4 color-curia">Team</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="block-2 ftco-animate">
                                <div class="flipper">
                                    <div class="front" style="background-image: url(/images/diego.jpg);">
                                        <div class="box">
                                            <h2 class="myrad">Diego Flores</h2>
                                             <p class="roboto">Bussines Developer</p>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <!-- back content -->
                                        <blockquote>
                                             <p class="roboto">&ldquo;“Statistician passionate about the generation of new options in all areas, seeking the protection and good of the environment, as well as a fighter for the dignity of environments and creative professions, believer and contemporary philosopher with the hope placed in the true progress of the humanity “ideas, creativity and action have no age, race or gender””' &rdquo;</p>
                                        </blockquote>
                                        <div class="author d-flex">
                                            <div class="image align-self-center">
                                                <img src="images/diego.jpg" alt="">
                                            </div>
                                            <div class="name align-self-center ml-3 myrad">Diego Flores <span class="position">Bussines Developer</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="block-2 ftco-animate">
                                <div class="flipper">
                                    <div class="front" style="background-image: url(/images/artrex.jpg);">
                                        <div class="box">
                                            <h2 class="myrad">Arturo Guevara</h2>
                                             <p class="roboto">Project Manager</p>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <!-- back content -->
                                        <blockquote>
                                             <p class="roboto">&ldquo;“Programmer, creative, enthusiast of the digital economy and Japanese illustration known as manga. He enjoys board games a lot no matter what they are or with whom he plays, without a doubt he is a born gamer. “Make a world that is more fun and simpler””      &rdquo;</p>
                                        </blockquote>
                                        <div class="author d-flex">
                                            <div class="image align-self-center">
                                                <img src="images/artrex.jpg" alt="">
                                            </div>
                                            <div class="name align-self-center ml-3 myrad">Arturo Guevara<span class="position">Project Manager</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="block-2 ftco-animate">
                                <div class="flipper">
                                    <div class="front" style="background-image: url(/images/luis.jpg);">
                                        <div class="box">
                                            <h2 class="myrad">Luis Pruneda</h2>
                                             <p class="roboto">CEO</p>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <!-- back content -->
                                        <blockquote>
                                             <p class="roboto">&ldquo;“Entrepreneur, passionate about learning and having new challenges,” life challenges us every day, to make us better, if you don't learn these lessons, she will take care of putting you back in those situations, until you learn it””
                                            &rdquo;</p>
                                        </blockquote>
                                        <div class="author d-flex">
                                            <div class="image align-self-center">
                                                <img src="images/luis.jpg" alt="">
                                            </div>
                                            <div class="name align-self-center ml-3 myrad">Luis Pruenda <span class="position">CEO</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- our team -->

        <!-- Economia -->
        <section class="ftco-section section d-flex justify-content-center " id="economia" style=" background-image: url('images/bg8.jpg'); background-size:cover;background-position:center">
            <div style="width: 80vw;" class="">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4 myrad color-curia">Economy</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-5 col-8 mt-lg-5 my-md-5  mb-lg-0 px-0 text-center" style="background-color:  rgb(11,43,90,.7);">
                        <img src="images/economy/1.png" width="100%" alt="" srcset="">
                        <div style="position: absolute; bottom:0" class="mb-1" >
                            <h2 class="myrad color-curia" style="font-size:20px">NFT</h2>
                            <p class="roboto" style="color: white; font-size:12px">Our NFT system combined with real estate investments guarantees an effective return in a period not exceeding 6 months.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-8 mx-lg-5  mx-md-5 mt-5 mt-lg-0 px-0 mb-5 text-center" style="background-color:  rgb(11,43,90,.7);">
                        <img src="images/economy/2.png" width="100%" alt="" srcset="">
                        <div style="position: absolute; bottom:0" class="mb-3" >
                            <h2 class="myrad color-curia" style="font-size:20px">Marketplace</h2>
                            <p class="roboto" style="color: white; font-size:12px">ROOMs can be traded with a 5% commission on the sale price</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-8 mt-lg-5  px-0 text-center" style="background-color:  rgb(11,43,90,.7);">
                        <img src="images/economy/3.png" width="100%" alt="" srcset="">
                        <div style="position: absolute; bottom:0" class="mb-1" >
                            <h2 class="myrad color-curia" style="font-size:20px">construction pool</h2>
                            <p class="roboto" style="color: white; font-size:12px">Any user can participate for a minimum of 25 USDT, the profits will be distributed once the term ends</p>
                        </div>
                        
                    </div>
                </div>
            </div>    
            <!-- <div class="container">   
                <div class="row">
                    <div class="col-md-4">
                    <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(images/services-1.jpg);"></div>
                    <div class="text">
                    <div class="icon"><span class="flaticon-architect"></span></div>
                    <h2>NFT</h2>
                    <p>Nuestro sistema de NFT combinado con inversiones inmobiliarias garantiza un rendimiento efectivo en un periodo no mayor de 6 meses</p>
                    
                    </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(images/services-2.jpg);"></div>
                    <div class="text">
                        <div class="icon"><span class="flaticon-worker"></span></div>
                        <h2>Marketplace</h2>
                        <p>Se podrán comerciar ROOMs con un 5% de comisión sobre el precio de venta</p>
                        
                    </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(images/services-3.jpg);"></div>
                    <div class="text">
                        <div class="icon"><span class="flaticon-hammer"></span></div>
                        <h2>Pool de construcción</h2>
                        <p>Cualquier usuario puede participar por un mínimo de 25 USDT, 
                            Las ganancias se repartirán una vez que concluya el plazo</p>
                        
                    </div>
                    </div>
                    </div>
                </div>
            </div> -->
        </section>
        <!-- Economia -->

        <!-- Nft -->
        <section class="ftco-section section" id="nft" style=" background-image: url('images/bg7.jpg'); background-size:cover;background-position:center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-5 pl-md-5 order-2 order-lg-1">
                        <div class="row justify-content-center mb-4 pt-md-4" style="background-color:  rgb(11,43,90,.7); padding:10px">
                            <div class="col-md-12 heading-section ftco-animate ">
                                <h3 class="roboto color-curia">ROOMs</h3>
                                <h2 class="mb-4 myrad" style="color:#0B2B5A;font-size:30px">Our NFT</h2>
                                <div class="d-flex about color-curia">
                                    <p>NFT = ROOMs</p>
                                </div>
                                <p style="color: white;" class="roboto">Every month the profit from these ROOMs is distributed to all the 
                                    owners of one, we will launch a finite number of them to offer organic and orderly growth.
                                    Each ROOM has 6 months of useful life with the option of obtaining 6 more months for renewal
 
                                </p>
                                <div class="d-flex video-image align-items-center mt-md-4">
                                    
                                    <p class="ml-2 myrad" style="color: white;">Be one of the first to get a  <span class="color-curia"> ROOM </span>participating in our  <a href="whitelist.php" class="color-curia"> whitelist!</a></p>
                                </div>
                                </br>
                                <div class="text-center">
                                <a href="whitelist.php" id="btnmarket" ><img height="40px" src="images/Marketplace.png"   onmouseover="this.src='images/MarketplaceOrange.png'" onmouseout="this.src='images/Marketplace.png'"></a>
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center order-1 order-lg-2">
                        <img src="images/Roomfinal.png" alt="" srcset="" width="100%" class="img-fluid">
                    </div>
                    
                </div>
            </div>
	    </section>
        <!-- NFT-->

        <!-- Road Map -->
        <div id="roadmap" class="section ftco-section" style="height: 100vh; background-image: url('images/bg6.png'); background-size:cover;background-position:center"> 
            <div class="container" style=" ">
                <div class="row justify-content-center ">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class=" myrad" style="color:#0B2B5A;font-size:30px">ROADMAP </h2>
                    </div>
                </div>                
            </div>
            <div class="row justify-content-center" style="height: 80vh; overflow-x: scroll;">
                    <img src="images/roadmap.png" height="100%"  alt="">
                </div>
            <!-- <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                <h2 class="mb-4 featurestitle">Q1</h2>
                                <ul style="list-style-type: none;">
                                    <li><i class="bi bi-check2-circle"></i> Pagina Web</li>
                                    <li><i class="bi bi-check2-circle"></i> Redes Sociales</li>
                                    <li><i class="bi bi-check2-circle"></i> WhitePaper</li>
                                    <li><i class="bi bi-check2-circle"></i> WhiteList</li>
                                    <li><i class="bi bi-circle"></i> Building Pool</li>
                                    <li><i class="bi bi-circle"></i> Pre-sale NFT</li>
                                </ul>
                            </div>
                        </div> 
                        <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>                   
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>  
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                            <h2 class="mb-4 featurestitle">Q2</h2>
                                <ul style="list-style-type: none;">
                                    <li><i class="bi bi-circle"></i> Marketplace</li>
                                    <li><i class="bi bi-circle"></i> Operación de NFT</li>
                                    <li><i class="bi bi-circle"></i> Segunda Pool</li>
                                    <li><i class="bi bi-circle"></i> Preventa de NFT G2</li>

                                </ul> </div>
                        </div> 
                                            
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                            <h2 class="mb-4 featurestitle">Q3</h2>
                            <ul style="list-style-type: none;">
                                    <li><i class="bi bi-circle"></i> Operacion de NFT G2</li>
                                    <li><i class="bi bi-circle"></i> Construcciones en redes sociales</li>
                              </ul> 
                            </div>
                        </div> 
                        <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>                       
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>  
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                            <h2 class="mb-4 featurestitle">Q4</h2>
                                <ul style="list-style-type: none;">
                                    <li><i class="bi bi-circle"></i> Operacion “Second Chance”</li>
                                    <li><i class="bi bi-circle"></i> Tercera Building pool</li>
                                    <li><i class="bi bi-circle"></i> Reegresar igresos de la primera “Building Pool”</li>
                                </ul> </div>
                        </div> 
                                            
                    </div>
                </div>
            </section> -->
        </div>
        <!-- Road Map-->

        <!-- Participar -->
        <section class="ftco-intro d-flex align-items-center section" id="whitelist" style="height: 100vh; background-image: url('images/bg4.jpg'); background-size:cover;background-position:center">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-md-12 text-center">
                            <div style="background-image: url('images/bg4-1.png'); background-size:cover;background-position:center; position:absolute; top:0;left:0;right:0;bottom:0; opacity:0.7"></div>
                            <div class="img"  >
                                
                                <h2 class="myrad">Whitelist</h2>
                                <p class="myrad">
                                    Be one of the primarchs and enter this new stage of digital investments, with the possibility of 
                                    being able to talk first-hand with the members of the Curia, not to mention the surprises and advantages that you will have at this stage.

                                </p>
                                     <h2 class="color-curia">15 USDT</h2>
                                        </br>
                                     <a href="whitelist.php" ><img height="40px" src="images/whitelisted-white.png"   onmouseover="this.src='images/whitelisted-orange.png'" onmouseout="this.src='images/whitelisted-white.png'"></a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Participar -->

         <!-- features empresa -->
         <div id="features" class="ftco-section section" style="background-image: url('images/bg3.png'); background-size:cover;background-position:center"> 
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-md-8 text-center heading-section ftco-animate">
                    <span class="subheading">Features</span>
                    <h2 class="mb-4">Features</h2>
                    </div>
                </div>
            </div>
            <div class="carouselContainer col-lg-9 col-12">
                <div class="carouselOfImages">
                        <div class="carouselImage" >
                            <div class="img">
                                <img src="images/features/1-en.png" class="img-carousel" alt="" srcset="">
                            </div>
                        </div>
                        <div class="carouselImage"><div class="img">
                                <img src="images/features/2-en.png" class="img-carousel" alt="" srcset="">
                            </div></div>
                        <div class="carouselImage"><div class="img">
                                <img src="images/features/3-en.png" class="img-carousel" alt="" srcset="">
                            </div></div>
                        <div class="carouselImage"><div class="img">
                                <img src="images/features/4-en.png" class="img-carousel" alt="" srcset="">
                            </div></div>
                        <div class="carouselImage"><div class="img">
                                <img src="images/features/5-en.png" class="img-carousel" alt="" srcset="">
                            </div></div>
                            <div class="carouselImage"><div class="img">
                                <img src="images/features/6-en.png" class="img-carousel" alt="" srcset="">
                            </div></div>
                            <div class="carouselImage"><div class="img">
                                <img src="images/features/7-en.png" class="img-carousel" alt="" srcset="">
                            </div></div>
                </div>
                <div class="gradient-left">
                </div>
                <div class="gradient-right">
                </div>
                <img src="images/features/flecha.png" alt="" style="position: absolute;top: 0px;right: 0px;max-height: 100%;">
            </div>

            <!-- <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Invierte en renta de departamentos</h2>
                                <p>Invertir en un NFT de Smart Curia representa una parte de el subarrendamiento de un bien 
                                    inmueble que genera una ganancia mensual, la cual se reparte entre
                                     los poseedores de NFTs</p>
                            </div>
                        </div> 
                        <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>                   
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>  
                    <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Marketplace y comercio</h2>
                                <p>En el marketplace se pueden comprar y vender los NFT, permitiendo entrar en el proyecto y crecer en el</p>
                            </div>
                        </div> 
                                            
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Pool de construcción</h2>
                                <p> Con el dinero reunido en la pool, el equipo de especialistas multidisciplinario se 
                                    encarga de todo el proceso de construcción y venta de inmuebles ofertando un retorno de inversión atractivo </p>
                            </div>
                        </div> 
                        <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>                       
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>  
                    <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Moneda estable</h2>
                                <p>Para ingresos más seguros y menos volátiles se usará Theter ya que es 
                                    compatible con otras redes y en en el diagnóstico  del equipo especializado es la más confiable de todas las monedas estables de la actualidad </p>
                            </div>
                        </div> 
                                            
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Ingresos sin operar</h2>
                                <p>Sin limite de tiempo para reclamar tu recompensa con el beneficio de ser acumulable </p>
                            </div>
                        </div> 
                        <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>                       
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                    <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>  
                    <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Innovando las inversiones tradicionales</h2>
                                <p> Las inversiones tradicionales a pesar de las nuevas tecnologias y multiples opciones siguen obteniendo resultados favorables.
                                    SmartCuria fusiona el mundo de las Crypto con el Inmobiliario creando un entorno seguro y rentable</p>
                            </div>
                        </div> 
                                            
                    </div>
                </div>
            </section>
            <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter">
                
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-md-6  bg-secondary pl-5">
                            <div class="heading-section heading-section-white pl-md-0 py-md-2 pr-md-2">
                                
                                <h2 class="mb-4 featurestitle">Second chance</h2>
                                <p>Crearemos una fundación que pueda dar refugio temporal de una forma digna a personas menores a 26 años con situaciones
                                    adversas </br> sin caridad todo rico es pobre</p>
                            </div>
                        </div> 
                        <div class="col-md-6" style="background-image: url(images/about-3.jpg); background-size: cover;"></div>                       
                    </div>
                </div>
            </section> -->
        </div>
          <!-- featiures empresa-->
          
         <!-- Descruipcion de curia -->
        <section class="pt-5 section" id="descripcion" style="background-image: url('images/bg2.jpg'); background-size:cover;background-position:center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center order-2 order-md-1">
                        <img src="images/about.jpg" alt="" class="img-fluid h-75">
                    </div>
                    <div class="col-md-6 py-4 pl-md-5 order-1 order-md-2">
                        <div class="row justify-content-center mb-4 pt-md-4">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading">About us</span>
                                <h2 class="mb-4 myrad" >Smart Curia</h2>
                                <div class="d-flex about">
                                    <div class="icon"><span class="flaticon-hammer"></span></div>
                                    <h3 class="robotom" style="font-size: 18px;">Providing a viable, functional and sustainable option guaranteeing a recurring income in USDT.</h3>
                                </div>
                                <p style="color: black;" class="roboto">Our business model is based on the fusion of the traditional world of real estate and the modern world of crypto actives. Supporting our project in tangible goods giving long-term profitability. Applying all our experience to ensure a safe and viable environment to invest in the short and long term
                                   </p>
                                <!-- <div class="d-flex video-image align-items-center mt-md-4">
                                    <a href="#" class="video img d-flex align-items-center justify-content-center" style="background-image: url(images/about-2.jpg);">
                                        <span class="fa fa-play-circle"></span>
                                    </a>
                                    <h4 class="ml-4">Video de introducción a Smart Curia</h4>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </section>
          <!-- Descruipcion de curia  -->
          <!-- home  -->
        <div class="section" style="background-image: url('images/bg1.jpg'); background-size:cover;background-position:center" id="home">
            <section class="hero-wrap js-fullheight"  data-stellar-background-ratio="0.5">
                  
                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight align-items-end "  data-scrollax-parent="true">
                            <div class="col-lg-6 ftco-animate mb-5">
                                <div class="mb-5" style="background-color:  rgb(11,43,90,.7); padding:10px">
                                    <h2 style="font-family: Mont-Heavy; font-size: 45px;" class="color-curia" >SMART CURIA</h2>
                                    <div class="d-flex mb-4">
                                    <p class=" roboto" style="margin-bottom: 0px; font-size: 14px;" >Merging &nbsp; 
                                    <span class="myrad white" style="font-size: 18px;" >crypto  &nbsp; </span>
                                        with the &nbsp; 
                                      <span class="myrad white" style="font-size: 18px;">real estate sector</span>
                                    </p>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                    <a href="pool.php" id="" onclick="pool(event)" ><img height="40px" src="images/ButtomPoolWhite.png"   onmouseover="this.src='images/ButtomPoolOrange.png'" onmouseout="this.src='images/ButtomPoolWhite.png'"></a>
                                     <a href="#" onclick="whitepaper(event)"  ><img src="images/ButtomWhitepaperWhite.png" height="40px"  onmouseover="this.src='images/ButtomWhitepaperOrange.png'" onmouseout="this.src='images/ButtomWhitepaperWhite.png'"></a>
                                                                    
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div> 
            <!-- home  -->
    
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
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modallable" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 5%;">
              <div class="modal-header">
                <h5 class="modal-title p-2" id="modaltitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <span id="modalmsj">
                        
                    </span>
              </div>
              <div class="modal-footer" style="border-radius: 50%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    <?php include "inc/scripts.php";?>
        <script type="text/javascript">

            var ver;
            console.log(ver.length);
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
            
            function whitepaper(e){
                const title="Whitepaper"
                const html='<div class="row"> <div class="col-6 text-center">  <img src="images/espanol.png" alt="" class="img-fluid" style="border-radius: 20%; height:15vh"></br></br>  <a href="assets/SmarCuria.pdf" class="btn btn-secondary" target="_blank">Descargar</a>  </div> <div  class="col-6 text-center"> <img src="images/ingles.png" alt="" class="img-fluid" style="border-radius: 20%;height:15vh"></br></br> <a href="assets/SmarCuria_en.pdf" class="btn btn-secondary" target="_blank">Download</a>  </div> </div>';
                fnmodal(e,title,html);
            }
            $("#btnmarket").click(function (e){
                const ht ="<h1 class='myrad color-curia'>Coming Soon </h1>"
                fnmodal(e,"¡Alert!",ht);
            })
            function pool(e){
                const ht ="<h1 class='myrad color-curia'>Coming Soon </h1>"
                fnmodal(e,"¡Alert!",ht);
            }

            function fnmodal(e,title,body) { 
                e.preventDefault();
                $("#modaltitle").html(title);
                 $("#modalmsj").html(body)
                $("#modal").modal("show");
             }
             
            
            window.onscroll = function() {elevador()};
            function elevador(){
               const secciones= $(".section");
               const n_secciones=$(".section").length;
                // console.log(secciones);
                // console.log(n_secciones);
                let j =0;
                for (let i = 0; i < secciones.length; i++) {
                    const e = $(secciones[i]).attr("id");
                    const o =$(secciones[i]).offset().top
                    let tamaño=0;
                    if(i>=(secciones.length-1)){

                    }else{
                        const o2=$(secciones[i+1]).offset().top
                        tamaño=o2-o;
                    }
                    const y = window.pageYOffset;
                    const w=window.innerHeight;
                    //  console.log(y +"y")
                    //  console.log(w+"w")
                    //  console.log(o+"o")
                    if(y+1>(o+tamaño) && j<n_secciones-1){
                        j++
                    }
                    //console.log(tamaño+o)
                }

                if(j==n_secciones-1){
                    $("#bajar").hide()
                    $("#bajar_t").hide()
                    $("#subir").show()
                    $("#subir_t").show()
                    $("#bajar").attr("href", "#"+$(secciones[j+1]).attr("id"))
                    $("#subir").attr("href", "#"+$(secciones[j-1]).attr("id"))
                }else if(j==0){
                    $("#subir").hide()
                    $("#subir_t").hide()
                    $("#bajar").show()
                    $("#bajar_t").show()
                    $("#bajar").attr("href", "#"+$(secciones[j+1]).attr("id"))
                }else{
                    $("#subir").show()
                    $("#bajar").show()
                    $("#bajar_t").hide()
                    $("#subir_t").hide()
                    $("#bajar").attr("href", "#"+$(secciones[j+1]).attr("id"))
                    $("#subir").attr("href", "#"+$(secciones[j-1]).attr("id"))
                }
                // console.log(window.pageYOffset+" y");
                // console.log(window.innerHeight+" w");
                // console.log($(secciones[j]).offset().top)
                // console.log($(secciones[j]))
                // console.log(j)

            }


            var $imagesCarousel = jQuery('.carouselOfImages').flickity({
                /* options, defaults listed */

                accessibility: false,
                /* enable keyboard navigation, pressing left & right keys */

                autoPlay: true,
                pauseAutoPlayOnHover: true,
                /* advances to the next cell
                if true, default is 3 seconds
                or set time between advances in milliseconds
                i.e. `autoPlay: 1000` will advance every 1 second */

                cellAlign: 'center',
                /* alignment of cells, 'center', 'left', or 'right'
                or a decimal 0-1, 0 is beginning (left) of container, 1 is end (right) */

                // cellSelector: '.topic-switcher__item',
                /* specify selector for cell elements */

                contain: false,
                /* will contain cells to container
                so no excess scroll at beginning or end
                has no effect if wrapAround is enabled */

                draggable: true,
                /* enables dragging & flickin
                freeScroll: false,
                enables content to be freely scrolled and flicked
                without aligning cells */

                friction: 0.2,
                /* smaller number = easier to flick farther */

                initialIndex: 0,
                /* zero-based index of the initial selected cell */

                lazyLoad: false,
                /* enable lazy-loading images
                set img data-flickity-lazyload="src.jpg"
                set to number to load images adjacent cells */

                percentPosition: true,
                /* sets positioning in percent values, rather than pixels
                Enable if items have percent widths
                Disable if items have pixel widths, like images */

                prevNextButtons: false,
                /* creates and enables buttons to click to previous & next cells */

                pageDots: false,
                /* create and enable page dots */

                resize: true,
                /* listens to window resize events to adjust size & positions */

                rightToLeft: false,
                /* enables right-to-left layout */

                setGallerySize: true,
                /* sets the height of gallery
                disable if gallery already has height set with CSS */

                watchCSS: false,
                /* watches the content of :after of the element
                activates if #element:after { content: 'flickity' }
                IE8 and Android 2.3 do not support watching :after
                set watch: 'fallbackOn' to enable for these browsers */

                wrapAround: true
                    /* at end of cells, wraps-around to first for infinite scrolling */
                });

                function resizeCells() {
                var flkty = $imagesCarousel.data('flickity');
                var $current = flkty.selectedIndex;
                var $length = flkty.cells.length;
                var $imageNumLimit = 5;
                if ($length < $imageNumLimit) {
                    $imagesCarousel.flickity('destroy');
                }
                jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedLeft");
                jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedRight");
                jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedLeft2");
                jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedRight2");
                jQuery('.carouselOfImages .carouselImage').eq($current - 1).addClass("nextToSelectedLeft");
                jQuery('.carouselOfImages .carouselImage').eq($current - 2).addClass("nextToSelectedLeft2");
                var $endCell;
                if ($current + 1 == $length) {
                    $endCell = "0";
                } else {
                    $endCell = $current + 1;
                }
                jQuery('.carouselOfImages .carouselImage').eq($endCell).addClass("nextToSelectedRight");
                if($endCell + 1 < $imageNumLimit){
                    jQuery('.carouselOfImages .carouselImage').eq($endCell + 1).addClass("nextToSelectedRight2"); 
                } else {
                    jQuery('.carouselOfImages .carouselImage').eq(0).addClass("nextToSelectedRight2");
                }
                }
                resizeCells();

                $imagesCarousel.on('scroll.flickity', function() {
                resizeCells();
                });


                //HOVER FUNCTIONS
                $('.carouselImage').bind("mouseover", function(){
                if (this.className === 'carouselImage nextToSelectedLeft') {
                    $imagesCarousel.flickity('playLeftSlowPlayer');
                } else if (this.className === 'carouselImage nextToSelectedLeft2') {
                    $imagesCarousel.flickity('playLeftFastPlayer');
                } else if (this.className === 'carouselImage nextToSelectedRight') {
                    $imagesCarousel.flickity('playRightSlowPlayer');
                } else if (this.className === 'carouselImage nextToSelectedRight2') {
                    $imagesCarousel.flickity('playRightFastPlayer');
                }
                });

                $('.carouselImage').bind("mouseout", function(){
                $imagesCarousel.flickity('pausePlayer');
                });
            
        </script> 
</body>

</html>