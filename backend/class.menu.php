<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">

			<?php
			require_once('../config/class.connect.php');			
			if (isset($_SESSION['uid']))
			{
				$sql = "select * from `app`,`acl`,`uig` 
				where `app`.`status` = '1' and `acl`.`status` = '1' and `uig`.`status` = '1' and `acl`.`appid` = `app`.`id` and `acl`.`ugid` = `uig`.`ugid` and `uig`.`uid` = '".$_SESSION['uid']."' 
				order by `app`.`appgroup`";
				$conn = new connect();
				$res = $conn->query($sql);
				
				$menus = [];
				while ($cdr = $res->fetch())
					{
						$name = $cdr['name'];
						$dir = $cdr['dir'];
						$parts = explode(' ', $name);
						$group = $parts[0];
						$menus[$group][] = $cdr;
						}
						
						foreach ($menus as $group => $items)
							{
								echo '<li class="nav-item dropdown">';
								echo '<a class="nav-link dropdown-toggle"
								href="#"
								role="button"
								data-bs-toggle="dropdown"
								aria-expanded="false">';
								echo $group;
								echo '</a>';
								
								echo '<ul class="dropdown-menu">';
								
								foreach ($items as $item)
									{
										echo '<li>';
										
									    echo '<a class="dropdown-item"
										href="index.php?option='.$item['dir'].'&task=def">';
										echo $item['name'];
										echo '</a>';
										echo '</li>';
										}
										echo '</ul>';
										echo '</li>';
										}	
										?>
				<li class="nav-item">
				<a class="nav-link" aria-current="page" href="index.php?option=logs&task=logout">Log out</a>
				</li>
			<?php
			}
			else 
			{
			?>
				<li class="nav-item">
				<a class="nav-link" aria-current="page" href="index.php?option=logs&task=login_form">Log in</a>
				</li>
			<?php
			}
		?>
        </ul>
        </div>
    </div>
</nav>