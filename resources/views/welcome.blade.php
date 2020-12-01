@extends('layout.booking')
@section('content')

    <div class="tabs-content" id="weather">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Best Hotel in Veyangoda</h2>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="col-md-12">
                        <div class="weather-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="tabs clearfix" data-tabgroup="second-tab-group">
                                        <li><a href="#frontHotel" class="active">Front</a></li>
                                        <li><a href="#backhotel">Back</a></li>
                                        <li><a href="#swimming">Swimming Pool</a></li>
                                        <li><a href="#ac">Ac Room</a></li>
                                        <li><a href="#noneac">None Ac Room</a></li>
                                    </ul>    
                                </div>
                                <div class="col-md-12">
                                    <section id="second-tab-group" class="weathergroup">
                                        <div id="frontHotel">
                                            <div>
                                                
                                            </div>
                                        </div>
                                        <div id="backhotel">
                                            <div>
                                                
                                            </div>
                                        </div>
                                        <div id="swimming">
                                            <div></div>
                                        </div>
                                        <div id="ac">
                                            
                                        </div>
                                        <div id="noneac">
                                            
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal1 hidemo" id="mainmodel">
        <div class="inmodal1" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                
              </div>
              <div class="modal-body">
                <h1 id="notifi"></h1>
                <p id="datep">Date:</p>
                <p id="todate">To Date:</p>
                <p id="forperson">For Persons:</p>
                <p id="acnoneac">Ac/None-AC:</p>
                <div class="col-md-6">
                    <fieldset>
                        <label for="to">Your Name</label>
                        <input name="nameMe" type="text" class="form-control date" id="nameMe" placeholder="Enter Name..." required onchange='this.form.()'>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <label for="to">Telephone Number</label>
                        <input name="phone" type="text" class="form-control date" id="phone" placeholder="Enter Mobile Number" required onchange='this.form.()'>
                    </fieldset>
                </div>

                
              </div>
              <div class="modal-footer">
                <button id="confirmbooking" type="button" class="btn btn-primary">BOok</button>
                <button id="okformclose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="modal2 hidemo" id="maimmodel">
        <div class="inmodal1" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                
              </div>
              <div class="modal-body">
                <h1 id="notifiok" style="color: red;"></h1>      
              </div>
              <div class="modal-footer">
                <button id="okbtn" type="button" class="btn btn-primary">OK</button>
                <button id="okformclo" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item first-service">
                        <div class="service-icon"></div>
                        <h4>Book via system</h4>
                        <p>Book your room through the official website. Check availability and book via system.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-service">
                        <div class="service-icon"></div>
                        <h4>Book for person count</h4>
                        <p>System automatically books rooms more than 1 if person count is higher. </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item third-service">
                        <div class="service-icon"></div>
                        <h4>Find for your date</h4>
                        <p>This system show details about the rooms wheather it's ac or not. also supports multiple room bookings.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>







    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="#" class="scroll-top">Booking</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Made by <em>heart</em></p>
                </div>
                <div class="col-md-12">
                    <a href="">Log into admin panel</a>
                </div>
            </div>
        </div>
    </footer>
@endsection