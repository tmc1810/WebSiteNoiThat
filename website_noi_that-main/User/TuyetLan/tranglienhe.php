<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        .span-icon{
            height: 50px;
            width: 50px;
            border: 2px solid #ff61cf;
            border-radius: 999px;
            font-size: auto;
            
            display: flex;
            align-items: center;
            justify-content: center;
             /* position: relative;  */
        }
        .icon{
            color: #ff61cf;
        }
        .p-text{
            margin-top: auto;
            margin-left: 1em;
            font-weight: bold;
        }
        h3 {
            
            padding-bottom: 5px ;
            border-bottom: 2px solid black;
        }

    </style>
</head>
<body>
    <div class="container " style="margin-top:2rem;" >
        <div class="row">
            <div class="address col-5">
                            <div class="row d-flex mt-5 ml-2">
                                <h3> Liên Hệ Với Chúng Tôi: </h3>
                            </div>
                            <div class="row d-flex mt-3 ml-2">
                                <span class=" span-icon">
                                    <i class=" icon bi bi-house-heart-fill "></i>
                                </span>
                                <p class="p-text">
                                    Address: 54 Trieu Khuc - Thanh Xuan - Ha Noi
                                </p>
                                <!-- <span class="bold"><i class="bi bi-house-heart">Address:</i></span>
                                <span class="">52 Trieu Khuc - Thanh Xuan Nam - Thanh Xuan - Ha Noi</span> -->
                            </div>
                            <div class="row d-flex mt-3 ml-2">
                                <span class=" span-icon">
                                    <i class=" icon bi bi-telephone"></i>
                                </span>
                                <p class="p-text">
                                    Phone: 0967.622.xxx
                                </p>
                                <!-- <span class="bold"><i class="bi bi-telephone">Phone:</i></span>
                                <span class="">0962.986.805</span> -->
                            </div>
                            <div class="row d-flex mt-3 ml-2">
                                <span class="span-icon d-flex align-items-center justify-content: center;">
                                    <i class="icon bi bi-envelope-heart-fill"></i>
                                </span>
                                <p class="p-text">
                                    Email: Tlan@gmail.com
                                </p>
                            </div>
                            
            </div>
                
            <div class="col mt-5">
                <div class="map">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.20327915781!2d105.79558857389428!3d20.98448708930044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc696073dd9%3A0x6dce4502afe3e1!2zNTQgUC4gVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1696659317604!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
            </div>
        </div>
        
        
    </div>
</body>
</html>
<?php
include_once 'footer.php';
?>