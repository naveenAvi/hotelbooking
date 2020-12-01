@extends('layout.main')
@section('content')
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Add listing</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Add listing</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Add listing</h4>
						</div>
						<div class="widget-inner">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Room Number</label>
										<div>
											<input id="roomnumber" class="form-control" type="text" name="roomNumber" value="">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label" id="addItem">Ac/Non-Ac</label>
										<div>
											<select name="roomtype" id="roomtype">
												<option value="ac">AC</option>
												<option value="noneac">Non-AC</option>
											</select>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">For How Many Person</label>
										<div>
											<input id="personcount" class="form-control" name="person" type="text" value="">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Price of the ROom</label>
										<div>
											<input id="roomprice" class="form-control" name="roomprice" type="text" value="">
										</div>
									</div>

									<div class="col-12">
										<button id="additem" type="submit" class="btn-secondry add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>Add Item</button>
										<button type="reset" class="btn">Save changes</button>
									</div>
								</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
		<div class="modal2 hidemo" id="notification">
			<div class="inmodal2" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div id="centerele" class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="notificationtet"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closenotibtn">
			          <span aria-hidden="true">&times;</span>
			        </button>
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
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closebtn">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p id="addroomcontext"></p>
		      </div>
		      <div class="modal-footer">
		        <button id="inser" type="button" class="btn btn-primary">Confirm</button>
		        <button id="closebtn" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>
	@endsection

	@section('jscontent')
	<script type="text/javascript">
		 $("#additem").click(function(){
		 	$('#addroomcontext').empty();
		 	var mainModel = document.getElementById("mainmodel");
		 	var addroomtext = document.getElementById("addroomcontext");
		 	var roomnumber = document.getElementById("roomnumber").value;
		 	var roomtype = document.getElementById("roomtype").value;
		 	var topersons = document.getElementById("personcount").value;
		 	var innerText = document.createTextNode('Room Number: ' + document.getElementById("roomnumber").value + ' Room Type: ' + document.getElementById("roomtype").value + ' For: ' + document.getElementById("personcount").value + " person");
		 	addroomtext.appendChild(innerText);
		 	mainModel.classList.remove('hidemo');
		 });
		 $("#closebtn").click(function(){
		 	var mainModel = document.getElementById("mainmodel");
		 	mainModel.classList.remove('showmo');
		 	mainModel.classList.add('hidemo');
		 });
		 function notificationsend(col, responsetext){
		 	$('#notificationtet').empty();
		 	if( col == 'green' ){
		 		var notimodel = document.getElementById("notification");
	        	var notimodelleft = document.getElementById("centerele");

	        	var addroomtext = document.getElementById("notificationtet");

	        	notimodelleft.classList.add('goodgreen');
	        	notimodelleft. classList.add('goodleft');
	        	notimodel.classList.remove('hidemo');
		 		notimodel.classList.add('showmo');

	        	var innerText = document.createTextNode(responsetext);
			 	addroomtext.appendChild(innerText);
			 }else{
			 	var notimodel = document.getElementById("notification");
	        	var notimodelleft = document.getElementById("centerele");

	        	var addroomtext = document.getElementById("notificationtet");

	        	notimodelleft.classList.add('wrong');
	        	notimodelleft.classList.add('wrongleft');
	        	notimodel.classList.remove('hidemo');
		 		notimodel.classList.add('showmo');

	        	var innerText = document.createTextNode(responsetext);

			 	addroomtext.appendChild(innerText);
			 }
		 }
		 
		 $("#closenotibtn").click(function(){
		 	var mainModel = document.getElementById("notification");
		 	mainModel.classList.remove('showmo');
		 	mainModel.classList.add('hidemo');
		 });
		 $("#inser").click(function(){
		 	alert('sadsa');
		 	var roomnumber = document.getElementById("roomnumber").value;
		 	var roomprice = document.getElementById("roomprice").value;
		 	var roomtype = document.getElementById("roomtype").value;
		 	var topersons = document.getElementById("personcount").value;

			var formData = {number:roomnumber ,persons:topersons , ac:roomtype, price:roomprice};
			//var formData = {name:"ravi",age:"31"};
		 	$.ajax({
                url : "/CreateRoom/insert",
                type: "GET",
                data : formData,
                success: function(data)
                {
                	obj = JSON.parse(data);
                    alert(obj.name);
                    if(obj.name == 'has'){
                    	var mainModel = document.getElementById("mainmodel");
                    	notificationsend("green", obj.res);
		 				mainModel.classList.remove('showmo');
		 				mainModel.classList.add('hidemo');
                    }else{
                    	var mainModel = document.getElementById("mainmodel");
                    	notificationsend("red", obj.res);
		 				mainModel.classList.remove('showmo');
		 				mainModel.classList.add('hidemo');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    notificationsend("red",'something went wrong!');
                }
            });
		 });
	</script>
	@endsection