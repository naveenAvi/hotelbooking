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
                <div class="col-md-5">
                    <div class="left-side">
                        
                        <div class="tabs-content">
                            <h4>Find More:</h4>
                            <ul class="social-links">
                                <li><a href="http://facebook.com"><em>Get Directions</em><i class="fa fa-map"></i></a></li>
                                <li><a href="http://youtube.com"><em>Contact us</em><i class="fa fa-phone"></i></a></li>
                                <li><a href="http://instagram.com"><em>Log in</em><i class="fa fa-user"></i></a></li>
                            </ul>
                        </div>
                        <div class="page-direction-button">
                            <a href="contact.html"><i class="fa fa-phone"></i>Contact Us Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form">
                                <h4>Check room <em>Availability</em>:</h4>  
                                <p id="notice" style="color:red;"></p>                        
                                <form id="form-submit">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="from">From:</label>
                                                <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Select date..." required onchange='this.form.()'>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="to">To:</label>
                                                <input name="deparure" type="text" class="form-control date" id="todate" placeholder="Select date..." required onchange='this.form.()'>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="departure">How many persons:</label>
                                                
                                                <select required name='from' id="persosns" onchange='this.form.()'>
                                                    <option value="">For...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-select">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <label for="round">AC</label>
                                                        <input type="radio" name="trip" id="aac" value="round" requiredonchange='this.form.()' checked="checked">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <label for="oneway">Non-AC</label>
                                                        <input type="radio" name="trip" id="none" value="one-way" requiredonchange='this.form.()'>
                                                    </div>
                                                </div>
                                            </div>
                                            <p id="response"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-subm" class="btn">Check availability</button>
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
        var message1 = 'Booked successfully';
        var message2 = 'booked without considering ac/none-ac';
        var message3 = 'Booked multiple rooms';

        //notification system
        function setNotifications(notifi,date,todate,forperson,acnoneac,col){
            $('#notifi').empty();
            $('#datep').empty();
            $('#todate').empty();
            $('#forperson').empty();
            $('#acnoneac').empty();

            var notifiele = document.getElementById("notifi");
            var datefromele = document.getElementById("datep");
            var todateele = document.getElementById("todate");
            var forpersonele = document.getElementById("forperson");
            var acnoneacele = document.getElementById("acnoneac");

            var notifitext = document.createTextNode(notifi);
            var datetext = document.createTextNode(date);
            var todatetext = document.createTextNode(todate);
            var forpersontext = document.createTextNode(forperson);
            var acnoneactext = document.createTextNode(acnoneac);

            notifiele.appendChild(notifitext);
            datefromele.appendChild(datetext);
            todateele.appendChild(todatetext);
            forpersonele.appendChild(forpersontext);
            acnoneacele.appendChild(acnoneactext);

            var mainModel = document.getElementById("mainmodel");
            mainModel.classList.remove('hidemo');
            mainModel.classList.add('showmo');
        }
        function setNotificationsmini(notifi){
            $('#notifiok').empty();

            var notifiele = document.getElementById("notifiok");

            var notifitext = document.createTextNode(notifi);

            notifiele.appendChild(notifitext);

            var mainModel = document.getElementById("maimmodel");
            mainModel.classList.remove('hidemo');
            mainModel.classList.add('showmo');
        }
        function addwarning(elef){
            var mainModel = document.getElementById(elef);
            mainModel.classList.add('warningborder');
        }
        function notice(noti){
            $('#notice').empty();
            var acnoneacele = document.getElementById("notice");
            var notifitext = document.createTextNode(noti);
            acnoneacele.appendChild(notifitext);
        }
        function validateIns(){
            var deparure = document.getElementById("deparure").value;
            var persosns = document.getElementById("persosns").value;
            var todate = document.getElementById("todate").value;
            var aac = document.getElementById("aac").checked;

            var isok = true;
            if( deparure.length < 1 ){
                addwarning('deparure');
                isok = false;
            }
            if( persosns.length < 1 ){
                addwarning('persosns');
                isok = false;
            }
            if( todate.length < 1 ){
                addwarning('todate');
                isok = false;
            }
            if( aac.length < 1 ){
                addwarning('aac');
                isok = false;
            }
            return isok;
        }
        $("#form-subm").click(function(){
            var isitok = validateIns();
            if(isitok){
                
                var deparure = document.getElementById("deparure").value;
                var persosns = document.getElementById("persosns").value;
                var todate = document.getElementById("todate").value;
                var aac = document.getElementById("aac").checked;
                var trc = 'ac';
                if(aac==false){
                    trc = 'none-ac';
                }else{
                    trc = 'ac';
                }
                
                var formData = {date:deparure,todate:todate,persons:persosns,ac:trc};

                $.ajax({
                    url : "check/check",
                    type: "GET",
                    data : formData,
                    success: function(data)
                    {
                        obj = JSON.parse(data);
                        //alert(obj.name);
                        deparure ='Date: ' + deparure;
                        todate ='To date:' +  todate;
                        persosns = 'For Persons: ' + persosns;
                        trc = 'Ac/None-ac : ' + trc;
                        if(obj.name == 'has'){
                            //(notifi,date,todate,forperson,acnoneac,col)
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'green' );
                        }
                        if(obj.name == 'has2'){
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'yellow' );
                        }
                        if(obj.name == 'has7'){
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'yellow' );
                        } 
                        if(obj.name == 'hasa6'){
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'red' );
                        } 
                        if(obj.name == 'has8'){
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'yellow' );
                        } 
                        if(obj.name == 'hasa9'){
                             setNotificationsmini(obj.res);
                        }
                        if(obj.name == 'hasa10'){
                            setNotificationsmini(obj.res);
                           // setNotifications(obj.res,deparure, todate, persosns, trc, 'red' );
                        } 
                        if(obj.name == 'haser'){
                            addwarning('todate');
                            notice('please correct the date');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        //alert(errorThrown);
                        setNotificationsmini('Internal Server Error');
                    }
                });
            }else{
                notice("Please Fill all boxes");
            }
         });
        $("#formclose").click(function(){
            var mainModel = document.getElementById("mainmodel");
            mainModel.classList.remove('showmo');
            mainModel.classList.add('hidemo');
         });
        
        $("#okformclose").click(function(){
            var mainModel = document.getElementById("mainmodel");
            mainModel.classList.remove('showmo');
            mainModel.classList.add('hidemo');
         });
        
        $("#okbtn").click(function(){
            var mainModel = document.getElementById("maimmodel");
            mainModel.classList.remove('showmo');
            mainModel.classList.add('hidemo');
         });
        
        $("#okformclo").click(function(){
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
            var isok = true;
            if( name.length < 1 ){
                addwarning('nameMe');
                isok = false;
            }
            if( tele.length < 1 ){
                addwarning('phone');
                isok = false;
            }
            var formData = {dates:deparure , todate:todate,persons:persosns,ac:acnone, name:name, tele:tele};
            if(isok){
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
        }
         });
    </script>
</body>
</html>