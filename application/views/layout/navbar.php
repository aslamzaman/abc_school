
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url('dashboard');?>"> <i class="fa fa-bar-chart"></i> Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars"></i> Menu <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('acpayable');?>">Acpayable</a></li>
				<li><a href="<?php echo base_url('acpayable_paid');?>">Acpayable Paid</a></li>				
				<li><a href="<?php echo base_url('arpaid');?>">Arpaid</a></li>
				
				<li class="divider"></li>					
				<li><a href="<?php echo base_url('sale');?>">Sale</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('payment');?>">Payment</a></li>
				<li class="divider"></li>				
				<li><a href="<?php echo base_url('lc');?>">LC</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('expenditure');?>">Expenditure</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('invoice');?>">Bill/Invoice</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('money_receipt');?>">Money Receipt</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('salary');?>">Salary</a></li>				
			</ul>
		</li>
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-wrench"></i> Settings <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('student');?>">Students Information</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('employee');?>">Employee</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('items');?>">Items</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('yearly_less');?>">Yearly Less</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('settings');?>">Settings</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('backup');?>">Backup Database</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>				
			</ul>
		</li>
		
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-print"></i> Reports <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('all_dues');?>">All Dues</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('expenditure_show');?>">Expenditure Show</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('expenditure_by_type');?>">Expenditure By Type</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('payment_in_period');?>">Payment In Period</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('salary_report');?>">Reports on Salary</a></li>				
			</ul>
		</li>		
      </ul>
    </div>
  </div>
</nav>

