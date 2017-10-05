<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="dashboard.php"><img src="../resources/img/logo.png" alt="logo"/></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="dashboard.php" class="menuitem">Dashboard</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Order <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">Order Request</a></li>
                    <li><a href="#">Order Pending</a></li>
                    <li><a href="#">Order History</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Shipping <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">New Shipping</a></li>
                    <li><a href="#">Updata Status</a></li>
                    <li><a href="#">Shipping Request</a></li>
                    <li><a href="#">Shipping Price</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Warehouse <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">New Item</a></li>
                    <li><a href="#">Transfer Order</a></li>
                </ul>
            </li>
            <li><a href="tracking.php" class="menuitem">Tracking</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">System User <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">Create New</a></li>
                    <li><a href="#">Staff List</a></li>
                    <li><a href="#">User List</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Other <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">Credit History</a></li>
                    <li><a href="#">Currency Adjustment</a></li>
                    <li><a href="#">Customer Inbox</a></li>
                </ul>
            </li>
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
</nav>