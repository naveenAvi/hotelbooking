
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
                        alert(obj.name);
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
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'red' );
                        }
                        if(obj.name == 'hasa10'){
                            setNotifications(obj.res,deparure, todate, persosns, trc, 'red' );
                        } 
                        if(obj.name == 'haser'){
                            addwarning('todate');
                            notice('please correct the date');
                        }
                        //data - response from server
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert(errorThrown);
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