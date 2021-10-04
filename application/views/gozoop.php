<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>spin the 3 images</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<link href='http://fonts.googleapis.com/css?family=Gravitas+One&text=1234567' rel='stylesheet' type='text/css'>

<style type="text/css">


        ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .jSlots-wrapper {
            overflow: hidden;
            height: 20px;
            display: inline-block; /* to size correctly, can use float too, or width*/
            border: 1px solid #999;
        }

        .slot {
            float: left;
        }



        /* ---------------------------------------------------------------------
           FANCY EXAMPLE
        --------------------------------------------------------------------- */
        .fancy .jSlots-wrapper {
            overflow: hidden;
            height: 100px;
            display: inline-block; /* to size correctly, can use float too, or width*/
            border: 1px solid #999;
        }

        .fancy .slot li {
            width: 100px;
            line-height: 100px;
            text-align: center;
            font-size: 70px;
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.8);
            font-family: 'Gravitas One', serif;
            border-left: 1px solid #999;
        }

        .fancy .slot:first-child li {
            border-left: none;
        }

        .fancy .slot li:nth-child(7) {
            background-color: #FFCE29;
        }
        .fancy .slot li:nth-child(6) {
            background-color: #FFA22B;
        }
        .fancy .slot li:nth-child(5) {
            background-color: #FF8645;
        }
        .fancy .slot li:nth-child(4) {
            background-color: #FF6D3F;
        }
        .fancy .slot li:nth-child(3) {
            background-color: #FF494C;
        }
        .fancy .slot li:nth-child(2) {
            background-color: #FF3333;
        }
        .fancy .slot li:nth-child(1),
        .fancy .slot li:nth-child(8) {
            background-color: #FF0000;
        }

        .fancy .slot li span {
            display: block;
        }

        /* ---------------------------------------------------------------------
           ANIMATIONS
        --------------------------------------------------------------------- */

        @-webkit-keyframes winner {
                0%, 50%, 100% {
                    -webkit-transform: rotate(0deg);
                    font-size:70px;
                    color: #fff;
                }
                25% {
                    -webkit-transform: rotate(20deg);
                    font-size:90px;
                    color: #FF16D8;
                }
                75% {
                    -webkit-transform: rotate(-20deg);
                    font-size:90px;
                    color: #FF16D8;
                }
        }
        @-moz-keyframes winner {
                0%, 50%, 100% {
                    -moz-transform: rotate(0deg);
                    font-size:70px;
                    color: #fff;
                }
                25% {
                    -moz-transform: rotate(20deg);
                    font-size:90px;
                    color: #FF16D8;
                }
                75% {
                    -moz-transform: rotate(-20deg);
                    font-size:90px;
                    color: #FF16D8;
                }
        }
        @-ms-keyframes winner {
                0%, 50%, 100% {
                    -ms-transform: rotate(0deg);
                    font-size:70px;
                    color: #fff;
                }
                25% {
                    -ms-transform: rotate(20deg);
                    font-size:90px;
                    color: #FF16D8;
                }
                75% {
                    -ms-transform: rotate(-20deg);
                    font-size:90px;
                    color: #FF16D8;
                }
        }


        @-webkit-keyframes winnerBox {
                0%, 50%, 100% {
                    box-shadow: inset 0 0  0px yellow;
                    background-color: #FF0000;
                }
                25%, 75% {
                    box-shadow: inset 0 0 30px yellow;
                    background-color: aqua;
                }
        }
        @-moz-keyframes winnerBox {
                0%, 50%, 100% {
                    box-shadow: inset 0 0  0px yellow;
                    background-color: #FF0000;
                }
                25%, 75% {
                    box-shadow: inset 0 0 30px yellow;
                    background-color: aqua;
                }
        }
        @-ms-keyframes winnerBox {
                0%, 50%, 100% {
                    box-shadow: inset 0 0  0px yellow;
                    background-color: #FF0000;
                }
                25%, 75% {
                    box-shadow: inset 0 0 30px yellow;
                    background-color: aqua;
                }
        }



        .winner li {
            -webkit-animation: winnerBox 2s infinite linear;
               -moz-animation: winnerBox 2s infinite linear;
                -ms-animation: winnerBox 2s infinite linear;
        }
        .winner li span {
             -webkit-animation: winner 2s infinite linear;
                -moz-animation: winner 2s infinite linear;
                 -ms-animation: winner 2s infinite linear;
        }
        .fancy .slot li span img {
                max-width: 95px;
            height: auto;
        }
        a.navbar-brand img {
            max-width: 130px;
        }
</style>



</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>fancy/logo.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </li>
            </ul>
            <a class="btn btn-primary text-white" type="button" href="<?php echo base_url().'Logout'; ?>" >Log Out</a>
          </div>
        </nav>   
            
    <div class="jumbotron text-center">
      <h1 class="display-3">Hello, world!</h1>
          <div class="fancy">
        <ul class="slot">
            <!-- In reverse order so the 7s show on load -->
            
            <!-- <li><span>3</span></li>
            <li><span>2</span></li> -->
            <li><span><img src="<?php echo base_url(); ?>fancy/logo.png"></span></li>
            <li><span><img src="<?php echo base_url(); ?>fancy/strawberry.jpeg"></span></li>
            <li><span><img src="<?php echo base_url(); ?>fancy/mango.jpeg"></span></li>
            <!-- <li><span><img src="<?php echo base_url(); ?>fancy/grapes.jpeg"></span></li> -->
        </ul>
    </div>
      <hr class="my-4">
      <?php $UserId = $this->session->userdata("UserId"); 
      // echo $UserId; ?>
      <!-- <input type="hidden" id="UserId" value="<?php echo $UserId; ?>"> -->
        <input type="button" id="playFancy" value="Play" class="btn btn-danger">
    </div>


    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>fancy/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>fancy/jquery.jSlots.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        
        // $(document).ready(function(){
        //     $("#playFancy").click(function(){
        //         var userid = $('#UserId').val();
        //         $.ajax({
        //             type: "POST",
        //             url: "<?php echo base_url(); ?>checkusercount",
        //             data: {userid: userid},
        //             dataType:"json",
        //             success: function(data){ 

        //             },
        //         });
        //     });
        // });
        
        // fancy example
        $('.fancy .slot').jSlots({
            number : 3,
            winnerNumber : 1,
            spinner : '#playFancy',
            easing : 'easeOutSine',
            time : 7000,
            loops : 12,
            onStart : function() {
                $('.slot').removeClass('winner');
            },
            onWin : function(winCount, winners) {
                // only fires if you win
                
                $.each(winners, function() {
                    this.addClass('winner');
                });

                // react to the # of winning slots                 
                if ( winCount > 1 ) {
                    // alert('You got ' + winCount + ' !!!');
                    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>runproject",
                    data: {winCount: winCount},
                    dataType:"json",//return type expected as json
                    success: function(data){
                        console.log(data);
                        // if (data == true) {
                        //     $('#SuccessAlert').show();
                        // } else {
                        //     $('#SuccessAlert').hide();
                        // }

                        // if (data == false) {
                        //     $('#ErrorAlert').show();
                        // } else {
                        //     $('#ErrorAlert').hide();
                        // }  

                    },
                });
                } 
                else if ( winCount = 0 ) {
                    alert('That was a great spin!!! \n One more try might make you lucky ');
                }


                
            }

        });
        
        
    </script>
    
</body>
</html>
