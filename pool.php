<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whitelist</title>
    <?php include "inc/styles.php";?>
    <style>
         .redes{
            
             position: sticky;
             position: -webkit-sticky;
             bottom: 0px;
         
         }
         @media (max-width: 991.98px) {
            .logo-lg{
                display: none;
            }            
        }
        .preloader{
                position:absolute;
                top:0;
                bottom:0;
                left:0;
                right:0;
                background:white;
                z-index: 10;

            }
        .spinner{
            position:relative;
            top:50%;
            left:50%;
        }
    </style>
</head>
<body>
    <div class="preloader">
      <div class="spinner-border spinner" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky1 ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
                <img src="images/logo.png" alt="" height="70px" srcset="" style=" position:relative;left:50%;transform: translateX(-50%);">
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
                
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a href="index.php#home" class="nav-link">Home</a></li>
                    <img src="images/logo.png" alt="" height="55px" class="" >
				
			</div>
            <a href="#" class="btn-custom" id="btn-login" >Login</a>
		</div>
	</nav>
    <section class="py-2 bg-half-light">
		<div class="container">
			<div class="row justify-content-center py-1">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<span class="subheading">Pools</span>
					<h2 class="mb-1">Pools Diponibles</h2>
				</div>
			</div>
			<div class="row" id="pooles">
				<!-- <div class="col-md-4">
					<div class="services-wrap ftco-animate">
						<div class="img" style="background-image: url(images/services-1.jpg);"></div>
						<div class="text">
							<div class="icon"><span class="flaticon-architect"></span></div>
							<h2>Architecture</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                </div>
                            <p>$1,500/$20,000</p>
							<a href="#" class="btn-custom">Participa</a>

						</div>
					</div>
				</div> -->
                
				
			</div>
		</div>
	</section>
        <section class="py-1 top redes">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-sm text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
                            <p class="mb-0 w-100">
                                <span class="fa fa-paper-plane"></span>
                                <span class="text">youremail@email.com</span>
                            </p>
                        </div> -->
                        <div class="col-sm justify-content-center d-flex mb-md-0 mb-2 col-lg-3">
                            <div class="social-media">
                                <p class="mb-0 d-flex">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="bi bi-telegram"><i class="sr-only">Telegram</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="bi bi-discord"><i class="sr-only">Discord</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="bi bi-youtube"><i class="sr-only">Youtube</i></span></a>
                                </p>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-md-6 col-lg-7 d-flex topper align-items-center text-lg-right justify-content-end">
                            <p class="mb-0 register-link"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Inquire Now</a></p>
                        </div> -->
                    </div>
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

        <?php include "inc/scripts.php";?>
    <script src='https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js'></script>
    <script src='https://unpkg.com/moralis@0.0.184/dist/moralis.js'></script>
    <!-- <script type='text/javascript' src='web3/whitelisto.js'></script> -->
    
        <script type="text/javascript">
            $(document).ready(function () {
                $.get("https://smartcuria.com/api/public/pool",
                function (data, textStatus, jqXHR) {
                    console.log(data);
                    cargar_pools(data);
                   
                }
                );
            });

            function cargar_pools(d){
                for (let i = 0; i < d.length; i++) {
                    const e = d[i]; 
                    console.log(e);
                    let fondeado=e.total;
                    let nombre =e.pool.nombre;
                    let goal = e.pool.goal;
                    let status= e.pool.status;
                    let id= e.pool.id;
                    let actual=Math.round(((fondeado/goal)*100));
                    const html='<div class="col-md-4"><div class="services-wrap "><div class="img" style="background-image: url(images/services-1.jpg);"></div> <div class="text"><div class="icon"><span class="flaticon-architect"></span></div><h2>'+nombre+'</h2><p></p><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'+actual+'" aria-valuemin="0" aria-valuemax="100" style="width: '+actual+'%"></div> </div><p>'+currency(fondeado).format()+'/'+currency(goal).format()+'</p><a href="pooles.php?id='+id+'" class="btn-custom">Participa</a> </div></div> </div>';                  
                    //console.log(html);
                    $("#pooles").append(html)
                    
                }
                $(".preloader").hide();
            }
           
            
            
        </script>  
    
</body>
</html>