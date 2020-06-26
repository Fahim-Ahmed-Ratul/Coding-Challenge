<?php
$con=mysqli_connect("localhost", "root", "", "dailyexpense");
?>

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
 $ret=mysqli_query($con,"select FullName from logins where ID={$uid}");
 $row=mysqli_fetch_assoc($ret);
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
