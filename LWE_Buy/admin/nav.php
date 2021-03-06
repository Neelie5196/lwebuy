<?php
$type = $_SESSION['type'];
if($type == 'admin'){
?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="dashboard.php"><img src="../resources/img/logo.png" alt="logo"/></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="dashboard.php" class="menuitem">Dashboard</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Order <span class="caret"></span></a>
                        <ul class="dropdown-menu menuitem">
                            <li><a href="orderrequest.php">Order Request</a></li>
                            <li><a href="orderpending.php">Order Pending</a></li>
                            <li><a href="orderhistory.php">Order History</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Shipping <span class="caret"></span></a>
                        <ul class="dropdown-menu menuitem">
                            <li><a href="shippinglist.php">Shipping List</a></li>
                            <li><a href="updateshipping.php?tracking_code=<?php echo '' ?>">Update Shipping</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Warehouse <span class="caret"></span></a>
                        <ul class="dropdown-menu menuitem">
                            <li><a href="store.php">Warehouse Store</a></li>
                            <li><a href="storer.php">Store Record</a></li>
                            <li><a href="slotlist.php">Manage Slot</a></li>
                            <li><a href="warehouselist.php">Manage Warehouse</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">System User <span class="caret"></span></a>
                        <ul class="dropdown-menu menuitem">
                            <li><a href="createnew.php">Create New</a></li>
                            <li><a href="adminlist.php">Admin List</a></li>
                            <li><a href="stafflist.php">Staff List</a></li>
                            <li><a href="customerlist.php">Customer List</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Other <span class="caret"></span></a>
                        <ul class="dropdown-menu menuitem">
                            <li><a href="rate.php">Adjust Rate</a></li>
                            <li><a href="topup.php">Top Up Request</a></li>
                            <li><a href="credithistory.php">Credit History</a></li>
                            <li><a href="packagelist.php">Package</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                        </ul>
                    </li>
                    <li><a href="message.php" class="menuitem">Inbox</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></a>
                        <ul class="dropdown-menu menuitem">
                            <li><a href="setting.php"><?php echo $_SESSION['email']; ?></a></li>
                        </ul>
                    </li>
                    <li><a href="../logout.php" class="rightnav"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
}else{
    ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="dashboard.php"><img src="../resources/img/logo.png" alt="logo"/></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="dashboard.php" class="menuitem">Dashboard</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Order <span class="caret"></span></a>
                            <ul class="dropdown-menu menuitem">
                                <li><a href="orderrequest.php">Order Request</a></li>
                                <li><a href="orderpending.php">Order Pending</a></li>
                                <li><a href="orderhistory.php">Order History</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Shipping <span class="caret"></span></a>
                            <ul class="dropdown-menu menuitem">
                                <li><a href="shippinglist.php">Shipping List</a></li>
                                <li><a href="updateshipping.php?tracking_code=<?php echo '' ?>">Update Shipping</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Warehouse <span class="caret"></span></a>
                            <ul class="dropdown-menu menuitem">
                                <li><a href="store.php">Warehouse Store</a></li>
                                <li><a href="storer.php">Store Record</a></li>
                                <li><a href="slotlist.php">Manage Slot</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Other <span class="caret"></span></a>
                            <ul class="dropdown-menu menuitem">
                                <li><a href="rate.php">Adjust Rate</a></li>
                                <li><a href="topup.php">Top Up Request</a></li>
                                <li><a href="credithistory.php">Credit History</a></li>
                            </ul>
                        </li>
                        <li><a href="message.php" class="menuitem">Inbox</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></a>
                            <ul class="dropdown-menu menuitem">
                                <li><a href="setting.php"><?php echo $_SESSION['email']; ?></a></li>
                            </ul>
                        </li>
                        <li><a href="../logout.php" class="rightnav"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
}                     
?>