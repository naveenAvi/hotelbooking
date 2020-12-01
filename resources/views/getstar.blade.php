<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Hotel booking system</title>
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/fontAwesome.css">
        <link rel="stylesheet" href="/css/hero-slider.css">
        <link rel="stylesheet" href="/css/owl-carousel.css">
        <link rel="stylesheet" href="/css/datepicker.css">
        <link rel="stylesheet" href="/css/tooplate-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <style type="text/css">
        .modal2{
            position: fixed;
            top: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        }
        .modal1{
            position: fixed;
            top: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        }
        .warningborder{
                border:1px solid red !important; 
            }
        .hidemo{
            
            display: none;
          }

          .showmo{
            /*animation: fadeout ease 20s;
            -webkit-animation: fadeout ease 20s;
            -moz-animation: fadeout ease 20s;
            -o-animation: fadeout ease 20s;
            -ms-animation: fadeout ease 20s;*/
            display: block;
          }
          .backgroundcol{
            background-color: #66ab438f;
          }
    </style>
<body>

    
    <section class="banner" id="top">
        <div class="backgroundcol">
        <div class="container">
            <div class="row">
                 <div class="col-md-6">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form">
                                <h4>Create <em> Admin</em>:</h4>  
                                <p id="notice" style="color:red;"></p>                        
                                <form id="form-submit">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="from">User Name:</label>
                                            <input type="text" name="usern" id="usern" class="form-control">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="from">Email:</label>
                                            <input type="text" name="usern" id="usern" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <fieldset>
                                                <label for="to">Password:</label>
                                                 <input type="password" name="password" id="password" class="form-control">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-5">
                                            <fieldset>
                                                <label for="to">Re type Password:</label>
                                                 <input type="password" name="password" id="password" class="form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <fieldset>
                                                <button type="button" id="form-sub" class="btn">Log In</button>
                                                
                                            </fieldset>
                                        </div>
                                        <div class="col-md-5">
                                            <fieldset>
                                                <button type="button" id="formtt" class="btn">Back</button>
                                                
                                            </fieldset>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form">
                                {{ $name }}
                                <h4>Log In <em>Admin</em>:</h4>  
                                @if($name == '')

                                @endif
                                @if($name == 'fill')
                                    <p id="notice" style="color:red;">Please Fill All Fields</p>  
                                @endif
                                @if($name == 'wrong')
                                <p id="notice" style="color:red;">Couldn't find the Account</p> 
                                @endif
                                @if($name == 'some')
                                <p id="notice" style="color:red;">Somethinge Went Wrong</p> 
                                @endif                    
                                <form id="form-submit" action="autoth" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="from">User Name:</label>
                                                <input type="text" name="usern" id="usern" class="form-control">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="to">Password:</label>
                                                 <input type="password" name="password" id="password" class="form-control">
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="submit" id="form-subm" class="btn">Log In</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        </div>
    </section>
    @yield('content')
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="/js/vendor/bootstrap.min.js"></script>
    
    <script src="/js/datepicker.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
    <script>
        
        $("#formclose").click(function(){
            var mainModel = document.getElementById("mainmodel");
            mainModel.classList.remove('showmo');
            mainModel.classList.add('hidemo');
         });
        
        $("#okformclose").click(function(){
            var mainModel = document.getElementById("maimmodel");
            mainModel.classList.remove('showmo');
            mainModel.classList.add('hidemo');
         });
        
        $("#okbtn").click(function(){
            var mainModel = document.getElementById("maimmodel");
            mainModel.classList.remove('showmo');
            mainModel.classList.add('hidemo');
         });
        $("#confirmbooking").click(function(){
            var deparure = document.getElementById("deparure").value;
            var persosns = document.getElementById("persosns").value;
            var todate = document.getElementById("todate").value;
            var aac = document.getElementById("aac").checked;
            var aacnone = document.getElementById("none").checked;
            var name = document.getElementById("nameMe").value;
            var tele = document.getElementById("phone").value;
            if(aac == false){
                acnone = 'none';
            }else{
              acnone = 'ac';  
            }

            var formData = {dates:deparure , todate:todate,persons:persosns,ac:acnone, name:name, tele:tele};
            $.ajax({
                url : "webinsert",
                type: "GET",
                data : formData,
                success: function(data)
                {
                    var mainModel = document.getElementById("mainmodel");
                    mainModel.classList.remove('showmo');
                    mainModel.classList.add('hidemo');
                    obj = JSON.parse(data);
                    alert(obj.name);
                    if(obj.name == 'has'){
                        //rooms booked with ac or none ac 
                        //alert('inserted');
                        var notifiele = document.getElementById("notifiok");
                        var acnoneactext = document.createTextNode(message1);
                        notifiele.appendChild(acnoneactext);

                        var mainModel = document.getElementById("maimmodel");
                        mainModel.classList.remove('showmo');
                        mainModel.classList.add('hidemo');
                    }
                    if(obj.name == 'has1'){
                        //rooms booked without considering ac none ac
                        var notifiele = document.getElementById("notifiok");
                        var acnoneactext = document.createTextNode(message2);
                        notifiele.appendChild(acnoneactext);
                        var mainModel = document.getElementById("maimmodel");
                        mainModel.classList.remove('hidemo');
                        mainModel.classList.add('showmo');
                        
                    }
                    if(obj.name == 'has2'){
                        //multiple rooms booked
                        var notifiele = document.getElementById("notifiok");
                        var acnoneactext = document.createTextNode(message3);
                        notifiele.appendChild(acnoneactext);
                        var mainModel = document.getElementById("maimmodel");
                        mainModel.classList.remove('hidemo');
                        mainModel.classList.add('showmo');
                    }
                    //data - response from server
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert(errorThrown);
                }
            });
         });
    </script>
</body>
</html>