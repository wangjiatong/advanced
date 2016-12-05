<?php

/* @var $this yii\web\View */

$this->title = '管理后台';
?>
<!--<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>-->
<div class="span9"><!--模板body开始-->
          <div class="well hero-unit">
            <h1>Welcome, Admin</h1>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
            <p><a class="btn btn-success btn-large" href="users.html">Manage Users &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div class="span3">
              <h3>Total Users</h3>
              <p><a href="users.html" class="badge badge-inverse">563</a></p>
            </div>
            <div class="span3">
              <h3>New Users Today</h3>
              <p><a href="users.html" class="badge badge-inverse">8</a></p>
            </div>
            <div class="span3">
              <h3>Pending</h3>
			  <p><a href="users.html" class="badge badge-inverse">2</a></p>
            </div>
            <div class="span3">
              <h3>Roles</h3>
			  <p><a href="roles.html" class="badge badge-inverse">3</a></p>
            </div>
          </div>
		  <br />
		  <div class="row-fluid">
			<div class="page-header">
				<h1>Pending Users <small>Approve or Reject</small></h1>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>E-mail</th>
						<th>Phone</th>
						<th>City</th>
						<th>Role</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<tr class="pending-user">
					<td>564</td>
					<td>John S. Schwab</td>
					<td>johnschwab@provider.com</td>
					<td>402-xxx-xxxx</td>
					<td>Bassett, NE</td>
					<td>User</td>
					<td><span class="label label-important">Inactive</span></td>
					<td><span class="user-actions"><a href="javascript:void(0);" class="label label-success">Approve</a> <a href="javascript:void(0);" class="label label-important">Reject</a></span></td>
				</tr>
				<tr class="pending-user">
					<td>565</td>
					<td>Juliana M. Sheffield</td>
					<td>julianasheffield@provider.com</td>
					<td>803-xxx-xxxx</td>
					<td>Columbia, SC</td>
					<td>User</td>
					<td><span class="label label-important">Inactive</span></td>
					<td><span class="user-actions"><a href="javascript:void(0);" class="label label-success">Approve</a> <a href="javascript:void(0);" class="label label-important">Reject</a></span></td>
				</tr>
				</tbody>
			</table>
		  </div>
        </div><!--模板body结束-->