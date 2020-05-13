<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>BlogBid API</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <style type="text/css">
        /*!

        =========================================================
        * Coming Sssoon Page - v1.3.2
        =========================================================

        * Product Page: https://www.creative-tim.com/product/coming-sssoon-page
        * Copyright 2017 Creative Tim (http://www.creative-tim.com)
        * Licensed under MIT (https://github.com/creativetimofficial/coming-sssoon-page/blob/master/LICENSE.md)

        =========================================================

        * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
        */

        body{

        }
        /*     General overwrite     */
        a{
            color: #2C93FF;
        }
        a:hover, a:focus {
            color: #1084FF;
        }
        a:focus, a:active,
        button::-moz-focus-inner,
        input[type="reset"]::-moz-focus-inner,
        input[type="button"]::-moz-focus-inner,
        input[type="submit"]::-moz-focus-inner,
        select::-moz-focus-inner,
        input[type="file"] > input[type="button"]::-moz-focus-inner {
            outline : 0;
        }

        /*           Typography          */

        p{
            font-size: 16px;
            line-height: 1.6180em;
        }

        .main{
            background-position: center center;
            background-size: cover;
            height: auto;
            left: 0;
            min-height: 100%;
            min-width: 100%;
            position: absolute;
            top: 0;
            width: auto;
        }
        .cover{
            position: fixed;
            opacity: 1;
            background-color: rgba(0,0,0,.6);
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .cover.black{
            background-color: rgba(0,0,0,.6);
        }

        .logo-container .logo{
            overflow: hidden;
            border-radius: 50%;
            border: 1px solid #333333;
            width: 60px;
            float: left;
        }

        .main .logo{
            color: #FFFFFF;
            font-size: 56px;
            font-weight: 300;
            position: relative;
            text-align: center;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.33);
            margin-top: 150px;
            z-index: 3;
        }
        .main .logo.cursive{
            font-family: 'Grand Hotel',cursive;
            font-size: 82px;

        }
        .main .content{
            position: relative;
            z-index: 4;
        }
        .main .motto{
            min-height: 140px;
        }
        .main .motto, .main .subscribe .info-text{
            font-size: 28px;
            color: #FFFFFF;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.33);
            text-align: center;
            margin-top: 50px;

        }
        .main .subscribe .info-text{
            font-size: 18px;
            margin-bottom: 30px;
        }

        .footer{
            position: relative;
            bottom: 20px;
            right: 0px;
            width: 100%;
            color: #AAAAAA;
            z-index: 4;
            text-align: right;
            margin-top: 50px;
        }
        .footer a{
            color: #FFFFFF;
        }

        @media (min-width:991px){
            .footer{
                position: fixed;
                bottom: 20px;
            }
        }

    </style>

    <!--     Fonts     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

</head>

<body>
<div class="main" style="background-image: url('https://dvecj1kzufveh.cloudfront.net/default2/background.jpg')">
    <div class="cover black" data-color="black"></div>
    <div class="container">
        <h1 class="logo cursive">
            BlogBid REST ful API
        </h1>

        <div class="content">
            <h4 class="motto">The endpoint can respond on various CRUD operations
            <div class="subscribe">
                <h5 class="info-text">
                    Not sure where to start ? <br> Here is a <a href="http://localhost/BlogBid-RESTful-API/api/post/read.php">GET Request</a><br>
                </h5>
                <p class="info-text">
                    The BlogBid is a content management system (CMS) designed for maintaining creative blogs and their respected categories<br>
                    To use the site more efficently & add various platform availability, I design a public RESTful API which helps to enhance the scope of BlogBid!!!> <br>
                    Make a pull request to contribute and raise issues to make the API more stronger and light-weight.<br>
                  
                </p>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <strong style="font-size:20px">Developed by <br>Shreyas Subhedar</strong>
            <!-- <a href="https://infinityfree.net"><img src="https://dvecj1kzufveh.cloudfront.net/default2/logo.png" alt="InfinityFree" height="40px"></a> -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
