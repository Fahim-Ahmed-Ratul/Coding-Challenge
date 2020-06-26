<?php
  $con=mysqli_connect("localhost", "root", "", "dailyexpense");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Tracker || Add Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	@include('includes.header')




  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
          <div class="profile-sidebar">
              <div class="profile-userpic">
                  <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
              </div>
              <div class="profile-usertitle">
                @php
                  $uid=$UserId;
                @endphp
                  <?php

  $ret=mysqli_query($con,"select FullName from logins where ID='$uid'");
  $row=mysqli_fetch_array($ret);
  $name=$row['FullName'];

  ?>
                  <div class="profile-usertitle-name"><?php echo $name; ?></div>
                  <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
              </div>
              <div class="clear"></div>
          </div>
          <div class="divider"></div>

          <ul class="nav menu">
              <li class="active"><a href="/dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>



              <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                  <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-1">
                      <li><a class="" href="/add-expense">
                          <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                      </a></li>
                      <li><a class="" href="/manage-expense">
                          <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                      </a></li>

                  </ul>

              </li>

    <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                  <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-2">
                      <li><a class="" href="/date">
                          <span class="fa fa-arrow-right">&nbsp;</span> Datewise Expenses
                      </a></li>
                      <li><a class="" href="/month">
                          <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Expenses
                      </a></li>
                      <li><a class="" href="/year">
                          <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Expenses
                      </a></li>

                  </ul>
              </li>





              <li><a href="{{ route('user') }}"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
               <li><a href="/change-password"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
  <li><a href="/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>

          </ul>
      </div>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->




		<div class="row">
			<div class="col-lg-12">



				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center">

</p>
						<div class="col-md-12">

							<form role="form" method="post" action="{{ route('addexpense') }}">
                @csrf
								<div class="form-group">
									<label>Date of Expense</label>
									<input class="form-control" type="date" value="" name="dateexpense" required="true">
								</div>
								<div class="form-group">
									<label>Item</label>
									<input type="text" class="form-control" name="item" value="" required="true">
								</div>

								<div class="form-group">
									<label>Cost of Item</label>
									<input class="form-control" type="text" value="" required="true" name="costitem">
								</div>

								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Add</button>
								</div>


								</div>

							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			@include('includes.footer')
		</div><!-- /.row -->
	</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>
