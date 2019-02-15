
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>					
                    <div class="panel-body">
						<p class="text-danger"><i>
							<?php
							if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}
							else
							{
								echo "User Ligin". form_error('user').form_error('pw'); 		
							}	
							?>
						</i></p>    					
                        <form action="<?php echo base_url('login/check');?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="user" type="text" value="admin" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pw" value="admin@321" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-md btn-success" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
