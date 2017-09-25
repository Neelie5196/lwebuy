<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><img src="resources/img/logo.png" alt="logo"/></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#dashboard" class="menuitem">Dashboard</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Purchase <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="purchaseproduct-1.php">Purchase Product</a></li>
                    <li><a href="purchaselist.php">Purchase List (Payment)</a></li>
                    <li><a href="purchasehistory.php">Purchase History</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Shipping <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">Shipping List</a></li>
                    <li><a href="#">Shipping Request</a></li>
                    <li><a href="#">Shipping History</a></li>
                </ul>
            </li>
            <li><a href="#tracking" class="menuitem">Tracking</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Point <span class="caret"></span></a>
                <ul class="dropdown-menu menuitem">
                    <li><a href="#">Buy Point</a></li>
                    <li><a href="#">Check Point</a></li>
                    <li><a href="#">Transaction History</a></li>
                </ul>
            </li>
            <li><a href="#service" class="menuitem">Service</a></li>
            <li><a href="#contact" class="menuitem">Contact us</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_id']; ?></a>
                <ul class="dropdown-menu menuitem">
                    <li>Email Address</li>
                    <li><a href="#">Setting</a></li>
                </ul>
            </li>
            <li><a href="#sign out" class="rightnav"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
        </ul>
    </div>
</nav>