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
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Purchase <span class="caret"></span></a>
                    <ul class="dropdown-menu menuitem">
                        <li><a href="purchaseproduct-1.php">Purchase Product</a></li>
                        <li><a href="purchaselist.php">Purchase List (Payment)</a></li>
                        <li><a href="purchasehistory.php">Purchase History</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Receive <span class="caret"></span></a>
                    <ul class="dropdown-menu menuitem">
                        <li><a href="receive-1.php">Receive Request</a></li>
                        <li><a href="receivehistory.php">Receive History</a></li>
                        <li><a href="receiveditem.php">Received Item</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Shipping <span class="caret"></span></a>
                    <ul class="dropdown-menu menuitem">
                        <li><a href="shippingpp.php">Pending Payment</a></li>
                        <li><a href="shippinglist.php">Shipping Request</a></li>
                        <li><a href="shippinghistory.php">Shipping History</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Point <span class="caret"></span></a>
                    <ul class="dropdown-menu menuitem">
                        <li><a href="package.php">Buy Point</a></li>
                        <li><a href="transaction.php">Transaction History</a></li>
                    </ul>
                </li>
                <li><a href="service.php" class="menuitem">Service</a></li>
                <li><a href="contact.php" class="menuitem">Contact us</a></li>
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