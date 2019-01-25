<nav class="navbar navbar-expand-lg navbar-dark bg-theme">
    <a class="navbar-brand nav-brand" href="/">AeroLink | Vendor Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto ">
            
            @if(CusAuth::VendorUser()->userLevel == '1') 
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-list">&nbsp;&nbsp;</i>Quotations</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-dollar">&nbsp;&nbsp;</i>Sale</a>
                </li>
            @endif

            @if(CusAuth::VendorUser()->userLevel == '0') 
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-list">&nbsp;&nbsp;</i>Request Management</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-dollar">&nbsp;&nbsp;</i>User/Supplier Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-dollar">&nbsp;&nbsp;</i>Quotation Management</a>
                </li>
            @endif
            

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-bell">&nbsp;&nbsp;</i>Notifications</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/Vendors/logout"><i class="fa fa-close">&nbsp;&nbsp;</i>Logout</a>
            </li>

        </ul>
    </div>
</nav>
