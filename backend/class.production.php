<?php

class production
{
    function def()
    {
        $conn = new connect();
		$acl = $conn->check_acl();
        if (isset($_REQUEST['searcher']))
        {
            $searcher = $_REQUEST['searcher'];
        }
        else
        {
            $searcher = null;
        }
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>Production</h2>
                <form action="index.php" method="get">
                <input name="searcher" value="<?php echo $searcher;?>">
                <input type="submit" value="Search">
                <?php
				if (($acl == '2') or ($acl > '5')) {
				?>
                <input type='button' value='Add' onclick='window.open("index.php?option=production&task=edit&id=0","_self")'>
                <?php
				}
				?>
                <input type="hidden" name="option" value="production">
                <input type="hidden" name="task" value="def">
                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>No.</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>User</th>
                            <th class='text-center'>Status</th>
                    <?php
					if (($acl == '2') or ($acl > '5')) {
					?>
                        <th class='text-center'>Action</th>
					<?php
					}
                    ?>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        $sql = "select `production`.`id` as `id`, `production`.`status` as `status`, `production`.`date` as `date`, (select `users`.`name` from `users` where `users`.`status` = '1' and `users`.`id` = `production`.`uid`) as `name`, (select `users`.`name` from `users` where `users`.`status` = '1' and `users`.`id` = `production`.`uaid`) as `uaid` from `production`";
                        if ($searcher <> null) 
                        {
                            $sql = $sql." and action like '%".$searcher."%' ";
                        }
                        $conn = new connect();
                        $res = $conn->query($sql);
                        while ($cdr = $res->fetch())
                        {
                            echo "<tr>";
                            echo "<td>";
                            echo $a;
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['date'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['name'];
                            echo "</td>";
                            echo "<td>";
                            if ($cdr['status'] == 1)
                            {
                                echo "Active";
                                $ds = "In-Active";
                                $dss = "0";
                            }
                            elseif ($cdr['status'] == 0)
                            {
                                echo "In-Active";
                                $ds = "Active";
                                $dss = "1";
                            }
                            elseif ($cdr['status'] == 2)
                            {
                                echo "Approve ";
								echo "by ".$cdr['uaid'];
                            }
                            elseif ($cdr['status'] == 3)
                            {
                                echo "Complete ";
								echo "by ".$cdr['uaid'];
                            }
                            echo "</td>";
                            if (($acl == '2') or ($acl > '5')) {
                            echo "<td>";
                            echo "<input type='button' value='Detail' onclick='window.open(\"index.php?option=production&task=det&id=".$cdr['id']."\",\"_self\")' />";
							if ($cdr['status'] < 2)
                            {
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=production&task=edit&id=".$cdr['id']."\",\"_self\")' />";
                            echo "<input type='button' value='".$ds."' onclick='confirm_del(\"index.php?option=production&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
							}
							if ($cdr['status'] == 1)
                            {
                            echo "<input type='button' value='Approve' onclick='window.open(\"index.php?option=production&task=del&id=".$cdr['id']."&stat=2\",\"_self\")' />";
							}
							if ($cdr['status'] == 2)
                            {
                            echo "<input type='button' value='Save Product' onclick='window.open(\"index.php?option=production&task=save_product&id=".$cdr['id']."\",\"_self\")' />";
							}
                            echo "</td>";
                            }
                            echo "</tr>";
                            $a++;
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <?php
    }
 
    function edit()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        if ($id == 0) 
        {
            $head = "Add";
            $date = date("Y-m-d");
        }
        else 
        {
            $head = "Edit";
            $sql = "select * from production where id = '".$id."'";
            $res = $conn->query($sql);
            while ($cdr = $res->fetch()) 
            {
                $date = $cdr['date'];
            }
        }
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>Production</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?> production</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>
                            <?php echo $_SESSION['uname'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input type = 'text' id='datepicker' name='date' value='<?php echo $date;?>'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                            <input type="submit" value="Save">
                            <input type="button" value="Back" onclick="window.open('index.php?option=production&task=def','_self')">
                            <input type="hidden" name="option" value="production">
                            <input type="hidden" name="task" value="save">
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Cost / Unit</td>
                        <td class='text-center'>Full</td>
                        <td class='text-center'>Number</td>
                    </tr>
                    <?php
                    $a = 1;
                    $sql = "select `receive_detail`.`id` as `stid`, `inventory`.`name` as `name`, `receive_detail`.`unit_price` as `value`, 
					`receive_detail`.`num` - ifnull((select sum(`production_detail`.`num`) from `production_detail` where `production_detail`.`status` = '1' and `production_detail`.`inventory_id` = `receive_detail`.`id` and `production_detail`.`prod_id` <> '".$id."'),0)
					as `net`, 
					(select `production_detail`.`num` from `production_detail` where `production_detail`.`status` = '1' and `production_detail`.`prod_id` = '".$id."' and `production_detail`.`inventory_id` = `receive_detail`.`id`) as `num` 
					from `inventory`, `receive`, `receive_detail` where `receive`.`rec_typ` = '1' and `receive`.`status` = '2' and `receive_detail`.`status` = '1' and `inventory`.`status` = '1' and `receive`.`id` = `receive_detail`.`receive_id` and `receive_detail`.`inventory_id` = `inventory`.`id` having `net` > '0' order by `inventory`.`id`";
					//echo $sql;
                    $res = $conn->query($sql);
                    while ($cdr = $res->fetch()) 
                    {
                        echo "<tr>";
                        echo "<td class='text-center'>";
                        echo $a;
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['name'];
                        echo "</td>";
                        echo "<td class='text-end'>";
						echo $cdr['value'];
                        echo "</td>";
                        echo "<td class='text-end'>";
						echo $cdr['net'];
                        echo "</td>";
                        echo "<td>";
                        if ($cdr['num'] == null) 
                        {
                            $num = 0;
                        }
                        else
                        {
                            $num = $cdr['num'];
                        }
                        echo "<input type='number' name='num-".$a."' value='".$num."' />";
                        echo "<input type='hidden' name='id-".$a."' value='".$cdr['stid']."' />";
                        echo "</td>";
                        echo "</tr>";
                        $a++;
                    }
                    echo "<input type='hidden' name='limit' value='".$a."' />";
                    echo "<input type='hidden' name='id' value='".$id."' />";
                    ?>
                </table>
                </form>
                </div>
            </div>
        </div>
        <?php
    }
 
    function save()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $date = $_REQUEST['date'];
        if ($id > 0) 
        {
            $sql = "update production set date = '".$date."' where id = '".$id."'";
            $conn->query($sql);
            $sql = "update production_detail set status = '0' where prod_id = '".$id."'";
            $conn->query($sql);
            $conn->save_logs("Edit Production #".$id,$_SESSION['uid']);
        }
        else 
        {
            $sql = "insert into production set date = '".$date."', `uid` = '".$_SESSION['uid']."'";
            $id = $conn->query_lastid($sql);
            $conn->save_logs("Add Production #".$id,$_SESSION['uid']);
        }
        $limit = $_REQUEST['limit'];
        $a = 1;
        while ($a < $limit) 
        {
            if ($_REQUEST['num-'.$a] > 0) 
            {
                $sql = "insert into production_detail set prod_id = '".$id."', inventory_id = '".$_REQUEST['id-'.$a]."', num = '".$_REQUEST['num-'.$a]."'";
                $conn->query($sql);
            }
            $a++;
        }
        header("location:index.php?option=production&task=def");
    }
 
    function del()
	{
		$conn = new connect();
		$id = $_REQUEST['id'];
		$stat = $_REQUEST['stat'];
		if ($stat == 2)
		{
			$sql = "UPDATE production SET status = '".$stat."', `uaid` = '".$_SESSION['uid']."', `app_date` = '".date('Y-m-d')."' WHERE id = '".$id."'";
			$conn->query($sql);
			$conn->save_logs("Approve production#".$id, $_SESSION['uid']);
			$sql = "select sum(`production_detail`.`num` * `receive_detail`.`unit_price`) as `value` from `production_detail`, `receive_detail` where `receive_detail`.`status` = '1' and `receive_detail`.`id` = `production_detail`.`inventory_id` and `production_detail`.`status` = '1' and `production_detail`.`prod_id` ='".$id."'";
			$res = $conn->query($sql);
			while ($cdr = $res->fetch()) 
			{
				$value = $cdr['value'];
			}
			$sql = "insert into acc set typ = '5', action = 'Production', date = '".date('Y-m-d')."', detail = 'Data from Production#".$id."', `uid` = '".$_SESSION['uid']."'";
			$acc_id = $conn->query_lastid($sql);
			$sql = "insert into `acc_detail` set `acc_id` = '".$acc_id."', `typ_id` = '10', `typ` = '1', `value` = '".$value."'";
			$res = $conn->query($sql);
			$sql = "insert into `acc_detail` set `acc_id` = '".$acc_id."', `typ_id` = '8', `typ` = '2', `value` = '".$value."'";
			$res = $conn->query($sql);
		}
		else
		{
			$sql = "UPDATE production SET status = '".$stat."' WHERE id = '".$id."' ";
			$conn->query($sql);
			if ($stat == 1)
			{
				$conn->save_logs("Active production#".$id, $_SESSION['uid']);
			}
			elseif ($stat == 0)
			{
				$conn->save_logs("In-Active production#".$id, $_SESSION['uid']);
			}
		}
		header("location:index.php?option=production&task=def");
	}
 
    function det()
    {
        $conn = new connect();
		$id = $_REQUEST['id'];
		$sql = "select * from `production` where `id` = '".$id."'";
		$res = $conn->query($sql);
		while ($cdr = $res->fetch())
		{
			$id = $cdr['id'];
			$date = $cdr['date'];
			$stats = $cdr['status'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>Production</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'>production Form</td>
                    </tr>
                    <tr>
                        <td>Doc ID</td>
                        <td>
                            <?php echo $id;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td>
                            <?php
						    $sql = "select * from `supplier` where `id` = '".$id."'";
						    $res = $conn->query($sql);
						    while ($cdr = $res->fetch())
						    {
							    echo $cdr['name'];
						    }
					        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <?php echo $date;?>
                        </td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>
                            <?php echo $_SESSION['uname'];?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                            <input type="button" value="print" onclick="window.open('print.php?cat=production&typ=det&id=<?php echo $id;?>','_self')">
                            <input type="button" value="Back" onclick="window.open('index.php?option=production&task=def','_self')">
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Value</td>
                        <td class='text-center'>Number</td>
                        <td class='text-center'>Total</td>
                    </tr>
                    <?php
                    $a = 1;
                    $net = 0;
                    $sql = "select `inventory`.`name` as name
                    , `inventory`.`id` as stid
                    , `production_detail`.`num` as `num` 
                    , `receive_detail`.`unit_price` as `production` 
                    from `production_detail`, `receive_detail`, `inventory` where `production_detail`.`status` = '1' and `receive_detail`.`status` = '1' and `inventory`.`status` = '1' and `production_detail`.`inventory_id` = `receive_detail`.`id` and `inventory`.`id` = `receive_detail`.`inventory_id`
                    and `production_detail`.`prod_id` = '".$id."'";
					//echo $sql;
                    $res = $conn->query($sql);
                    while ($cdr = $res->fetch()) 
                    {
                        echo "<tr>";
                        echo "<td class='text-center'>";
                        echo $a;
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['name'];
                        echo "</td>";
                        
                        echo "<td class='text-end'>";
                        echo number_format($cdr['production'],2);
                        echo "</td>";
                        
                        echo "<td>";
                        echo $cdr['num'];
                        echo "<input type='hidden' name='id-".$a."' value='".$cdr['stid']."' />";
                        echo "</td>";
                        echo "<td class='text-end'>";
                        $production = $cdr['production'];
                        $num = $cdr['num'];
                        $total = ($production * $num);
                        echo number_format($total,2);
                        echo "</td>";
                        echo "</tr>";
                        $net = $net + $total;
                        $a++;
                    }
                    echo "<tr>";
                    echo "<td colspan='4'>";
                    echo "Net Total";
                    echo "</td>";
                    echo "<td class='text-end'>"; 
                    echo number_format($net,2);
                    echo "</td>";
                    echo "</tr>";
                    echo "<input type='hidden' name='limit' value='".$a."' />";
                    echo "<input type='hidden' name='id' value='".$id."' />";
                    ?>
                </table>
				<?php
					if ($stats > 2)
					{
				?>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td> 
                        <td class='text-center'>Value</td>
                        <td class='text-center'>Number</td>
                        <td class='text-center'>Total</td>
                    </tr>
                    <?php
                    $a = 1;
                    $net = 0;
                    $sql = "select `inventory`.`name` as `name`, `inventory`.`sale` as `production`, `receive_detail`.`num` as `num` from `receive`, `receive_detail`, `inventory` where `receive_detail`.`status` = '1' and `receive`.`rec_typ` = '2' and `receive`.`po_id` = '".$id."' and `receive`.`id`= `receive_detail`.`receive_id` and `inventory`.`id` = `receive_detail`.`inventory_id`";
					//echo $sql;
                    $res = $conn->query($sql);
                    while ($cdr = $res->fetch()) 
                    {
                        echo "<tr>";
                        echo "<td class='text-center'>";
                        echo $a;
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['name'];
                        echo "</td>";
                        
                        echo "<td class='text-end'>";
                        echo number_format($cdr['production'],2);
                        echo "</td>";
                        
                        echo "<td>";
                        echo $cdr['num'];
                        echo "</td>";
                        echo "<td class='text-end'>";
                        $production = $cdr['production'];
                        $num = $cdr['num'];
                        $total = ($production * $num);
                        echo number_format($total,2);
                        echo "</td>";
                        echo "</tr>";
                        $net = $net + $total;
                        $a++;
                    }
                    echo "<tr>";
                    echo "<td colspan='4'>";
                    echo "Net Total";
                    echo "</td>";
                    echo "<td class='text-end'>"; 
                    echo number_format($net,2);
                    echo "</td>";
                    echo "</tr>";
                    echo "<input type='hidden' name='limit' value='".$a."' />";
                    echo "<input type='hidden' name='id' value='".$id."' />";
                    ?>
                </table>
				<?php
					}
				?>
                </form>
                </div>
            </div>
        </div>
        <?php
    }

	function save_product()
	{
        $conn = new connect();
        $id = $_REQUEST['id'];
		$head = "Save";
		$sql = "select * from production where id = '".$id."'";
		$res = $conn->query($sql);
		while ($cdr = $res->fetch()) 
		{
			$date = $cdr['date'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>Save Production</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?> production</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>
                            <?php echo $_SESSION['uname'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <?php echo $date;?>
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Value</td>
                        <td class='text-center'>Number</td>
                        <td class='text-center'>Total</td>
                    </tr>
                    <?php
                    $a = 1;
                    $net = 0;
                    $sql = "select `inventory`.`name` as name
                    , `inventory`.`id` as stid
                    , `production_detail`.`num` as `num` 
                    , `receive_detail`.`unit_price` as `production` 
                    from `production_detail`, `receive_detail`, `inventory` where `production_detail`.`status` = '1' and `receive_detail`.`status` = '1' and `inventory`.`status` = '1' and `production_detail`.`inventory_id` = `receive_detail`.`id` and `inventory`.`id` = `receive_detail`.`inventory_id`
                    and `production_detail`.`prod_id` = '".$id."'";
					//echo $sql;
                    $res = $conn->query($sql);
                    while ($cdr = $res->fetch()) 
                    {
                        echo "<tr>";
                        echo "<td class='text-center'>";
                        echo $a;
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['name'];
                        echo "</td>";
                        
                        echo "<td class='text-end'>";
                        echo number_format($cdr['production'],2);
                        echo "</td>";
                        
                        echo "<td>";
                        echo $cdr['num'];
                        echo "<input type='hidden' name='id-".$a."' value='".$cdr['stid']."' />";
                        echo "</td>";
                        echo "<td class='text-end'>";
                        $production = $cdr['production'];
                        $num = $cdr['num'];
                        $total = ($production * $num);
                        echo number_format($total,2);
                        echo "</td>";
                        echo "</tr>";
                        $net = $net + $total;
                        $a++;
                    }
                    echo "<tr>";
                    echo "<td colspan='4'>";
                    echo "Net Total";
                    echo "</td>";
                    echo "<td class='text-end'>"; 
                    echo number_format($net,2);
                    echo "</td>";
                    echo "</tr>";
                    echo "<input type='hidden' name='limit' value='".$a."' />";
                    echo "<input type='hidden' name='id' value='".$id."' />";
                    ?>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Value</td>
                        <td class='text-center'>Number</td>
                        <td class='text-center'>Warehouse</td>
                    </tr>
                    <?php
                    $a = 1;
                    $net = 0;
                    $sql = "select `inventory`.`name` as `name`
                    , `inventory`.`id` as `stid`
                    , `inventory`.`sale` as `sale`
                    from `inventory` where `inventory`.`status` = '1' and `inventory`.`typ_id` = '3'";
					//echo $sql;
                    $res = $conn->query($sql);
                    while ($cdr = $res->fetch()) 
                    {
                        echo "<tr>";
                        echo "<td class='text-center'>";
                        echo $a;
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['name'];
                        echo "</td>";
                        echo "<td class='text-end'>";
                        echo number_format($cdr['sale'],2);
                        echo "</td>";
                        echo "<td>";
                        echo "<input type='hidden' name='unit_price-".$a."' value='".$cdr['sale']."' />";
                        echo "<input type='hidden' name='id-".$a."' value='".$cdr['stid']."' />";
                        echo "<input type='number' name='num-".$a."' value='0' />";
                        echo "</td>";
                        echo "</tr>";
                        $net = $net + $total;
                        $a++;
                    }
                    echo "<input type='hidden' name='limit' value='".$a."' />";
                    echo "<input type='hidden' name='id' value='".$id."' />";
                    ?>
                    <tr>
                        <td colspan='5' class='text-center'>
                            <input type="submit" value="Save">
                            <input type="button" value="Back" onclick="window.open('index.php?option=production&task=def','_self')">
                            <input type="hidden" name="option" value="production">
                            <input type="hidden" name="task" value="save_prod">
                        </td>
                    </tr>
                </table>
                </form>
                </div>
            </div>
        </div>
        <?php
	}

	function save_prod()
	{
        $conn = new connect();
        $id = $_REQUEST['id'];
		$sql = "UPDATE production SET status = '3' WHERE id = '".$id."' ";
		$conn->query($sql);
		$sql = "insert into receive set supplier_id = '".$supplier."', date = '".$date."', `uid` = '".$_SESSION['uid']."', `po_id` = '".$id."', `rec_typ` ='2'";
		$id = $conn->query_lastid($sql);
		$conn->save_logs("Add Receive #".$id,$_SESSION['uid']);
        $limit = $_REQUEST['limit'];
        $a = 1;
        while ($a < $limit) 
        {
            if ($_REQUEST['num-'.$a] > 0) 
            {
                $sql = "insert into receive_detail set receive_id = '".$id."', inventory_id = '".$_REQUEST['id-'.$a]."', num = '".$_REQUEST['num-'.$a]."', unit_price = '".$_REQUEST['unit_price-'.$a]."', `location_id` = '".$_REQUEST['location_id-'.$a]."'";
                $conn->query($sql);
            }
            $a++;
        }
        header("location:index.php?option=production&task=def");
	}

}

?>