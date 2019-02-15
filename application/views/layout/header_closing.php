
</head>
<body style="margin-top:0px;">
<!--
<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Store</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div> 

<div class="jumbotron">
</div> 
-->
<div style="margin-top:50px;"></div>
<?php
if(empty($_SESSION['user']))
{
	unset($_SESSION['user']);
	//redirect('login');
}
?>	