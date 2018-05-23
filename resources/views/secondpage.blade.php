<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Production Income Prediction</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/nice-select.css">			
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

        <!-- Start Header Area -->
        <header class="default-header">
            <nav class="navbar navbar-expand-lg  navbar-light">
                <div class="container">
                      <a class="navbar-brand" href="{{route('homepage')}}">
                          <h3>PIP</h3>
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a href="{{route('/homepage')}}">Home</a></li>
                            								
                        </ul>
                      </div>						
                </div>
            </nav>
        </header>
        <!-- End Header Area -->
            <!-- Start banner Area -->
        <section class="generic-banner relative">		
            <div class="container">
                <div class="row  align-items-center justify-content-center">
                    <div class=" mt-50 mb-50 col-lg-10">
                        <div class="">
                            <h2 class="text-white">Input All The Data You need.</h2>
                            <!-- numcol, yieldpercol, totalprod, stocks, priceperlb, year -->
                            <form id="predict" action="{{url('/result')}}">
                                <div class="form-group row">
                                  <label for="numcol">Numcol</label>
                                  <input type="number" class="form-control" id="numcol" placeholder="Number of honey producing colonies:">
                                </div>
                                <div class="form-group row">
                                  <label for="yieldpercol">Yieldpercol</label>
                                  <input type="number" class="form-control" id="yieldpercol" placeholder="Yield per colony (lbs)">
                                </div>
                                <div class="form-group row">
                                    <label for="totalprod">Totalprod</label>
                                    <input type="number" class="form-control" id="totalprod" placeholder="Total production (numcol*yieldpercol), (lbs)">
                                </div>
                                <div class="form-group row">
                                    <label for="stocks">Stocks</label>
                                    <input type="number" class="form-control" id="stocks" placeholder="Stocks held by producers on Dec 15 (lbs)">
                                </div>
                                <div class="form-group row">
                                    <label for="stocks">Priceperlb</label>
                                    <input type="number" class="form-control" id="priceperlb" placeholder="Average price per pound ($)">
                                </div>
                                <div class="form-group row">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" placeholder="Year the data pertains to">
                                </div>
                                <button type="button" class="btn btn-primary" id="predict">Submit</button>
                                <br><br>
                                <h3>Result</h3>
                                <label for="examplePredict" id="predictData" class="form-control">
                                    <input type="hidden" name="predictDataTemp" id="predictDataRes">
                                    US$  
                                </label>
                              </form>	
                        </div>				
                    </div>
                </div>
            </div>
        </section>		
        <!-- End banner Area -->
        <script src="https://code.jquery.com/jquery-1.8.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            
                $('#predict').click(function(){
                var numcol=$('#numcol').val();
                var yieldpercol=$('#yieldpercol').val();
                var totalprod=$('#totalprod').val();
                var stocks=$('#stocks').val();
                var priceperlb=$('#priceperlb').val();
                var year=$('#year').val();

                $.ajax({
                type: "POST",
                url:"https://pipmlproject.herokuapp.com/input/task",
                data:'{"numcol":'+numcol+',"yieldpercol":'+yieldpercol+',"totalprod":'+totalprod+',"stocks":'+stocks+',"priceperlb":'+priceperlb+',"year":'+year+'}',
                contentType: 'application/json; charset=utf-8',
                dataType: "json",
                success:function(data){
                  console.log(data);
                  var dataTemp=data['message'];
                  $('#predictData').append(dataTemp);
                  $('#predictDataRes').val(dataTemp);
                }
              });
            });
          });

        </script>
    
    <!-- About Generic Start -->
    <div class="main-wrapper">
        <!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-6  col-md-12">
                       
                    </div>
                    <div class="col-lg-3  col-md-12">
                       
                    </div>						
                </div>

                <div class="row footer-bottom d-flex justify-content-between">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->	


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.DonutWidget.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>