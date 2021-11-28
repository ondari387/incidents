<div class="span3">
	<div class="sidebar">


		<ul class="widget widget-menu unstyled">
			<li>
				<a class="collapsed" data-toggle="collapse" href="#togglenotanonymousPages">
					<i class="menu-icon icon-cog"></i>
					<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
					Anonymous Incidents
				</a>
				<ul id="togglenotanonymousPages" class="collapse unstyled">
					<li>
						<a href="notprocess-incidents.php">
							<i class="icon-tasks"></i>
							Not Processed Incidents
							<?php
							$rt = mysqli_query($bd, "SELECT * FROM anonymous where status is null");
							$num1 = mysqli_num_rows($rt); { ?>

								<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="inprocess-incidents.php">
							<i class="icon-tasks"></i>
							Pending Incident
							<?php
							$status = "in Process";
							$rt = mysqli_query($bd, "SELECT * FROM anonymous where status='$status'");
							$num1 = mysqli_num_rows($rt); { ?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>
						</a>
					</li>
					<li>
						<a href="closed-incidents.php">
							<i class="icon-inbox"></i>
							Closed Incident
							<?php
							$status = "closed";
							$rt = mysqli_query($bd, "SELECT * FROM anonymous where status='$status'");
							$num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
							<?php } ?>

						</a>
					</li>

				</ul>
			</li>


			<li>
				<a href="manage-users.php">
					<i class="menu-icon icon-group"></i>
					Manage users
				</a>
			</li>
		</ul>


		<ul class="widget widget-menu unstyled">
			<li><a href="colleges.php"><i class="menu-icon icon-tasks"></i> Manage College </a></li>
			<li><a href="schools.php"><i class="menu-icon icon-paste"></i>Manage School</a></li>
			<li><a href="departments.php"><i class="menu-icon icon-tasks"></i>Manage Department </a></li>
		</ul>
		<!--/.widget-nav-->

		<ul class="widget widget-menu unstyled">
			<li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a></li>

			<li>
				<a href="logout.php">
					<i class="menu-icon icon-signout"></i>
					Logout
				</a>
			</li>
		</ul>

	</div>
	<!--/.sidebar-->
</div>
<!--/.span3-->