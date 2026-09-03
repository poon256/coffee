<?php

class payment
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
				<h2>Payment</h2>
                <form action='index.php' method='get'>
                <input name='searcher' value='<?php echo $searcher;?>'>
                <input type='submit' value='Search'>
                <?php
					if (($acl == '2') or ($acl > '5')) {
				?>
                <input type='button' value='Add' onclick='window.open("index.php?option=payment&task=add","_self")'>
                <?php
				}
				if ($acl > '3') {
				?>
                <input type='button' value='Print' onclick='window.open("print.php?cat=payment&typ=all","_self")'>
                <?php
				}
				?>
                <input type='hidden' name='option' value='payment'>
                <input type='hidden' name='task' value='def'>
                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>Id</th>
                            <th class='text-center'>Detail</th>
                            <th class='text-center'>Value</th>
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
                        $sql = "select `payment`.`id` as `id`, `payment`.`value` as `value`, `payment`.`status` as `status`, `payment`.`detail` as `detail`, `payment`.`date` as `date`, (select `users`.`name` from `users` where `users`.`status` = 1 and `users`.`id` = `payment`.`uaid`) as `uaid` from `payment` ";
                        $conn = new connect();
                        $res = $conn->query($sql);
                        while ($cdr = $res->fetch())
                        {
                            echo "<tr>";
                            echo "<td>";
                            echo $cdr['id'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['detail'];
                            echo "<br />";
                            echo $cdr['date'];
                            echo "</td>";
                            echo "<td class='text-end'>";
                            echo number_format($cdr['value'],2);
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
                            echo "</td>";
                            if (($acl == '2') or ($acl > '5')) {
                            echo "<td>";
                            echo "<input type='button' value='Detail' onclick='window.open(\"index.php?option=payment&task=det&id=".$cdr['id']."\",\"_self\")' />";
                            if ($cdr['status'] <> 2)
                            {
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=payment&task=edit&id=".$cdr['id']."\",\"_self\")' />";
						    echo "<input type='button' value='".$ds."' onclick='confirm_del(\"index.php?option=payment&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
                            }
							if ($cdr['status'] == 1)
                            {
                            echo "<input type='button' value='Approve' onclick='window.open(\"index.php?option=payment&task=approve&id=".$cdr['id']."&stat=2\",\"_self\")' />";
							}
						    echo "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <?php
    }

    function add()
	{
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
					<h3>
						Select Receive to Payment
					</h3>
				</div>
			</div>
            <div class='row'>
                <div class='col-12'>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>No.</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>Supplier</th>
                            <th class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        $sql = "select `supplier`.`name` as `name`, `receive`.`id` as `id`, `receive`.`status` as `status`, `receive`.`date` as `date`, (select `users`.`name` from `users` where `users`.`status` = '1' and `users`.`id` = `receive`.`uaid`) as `uaid` from `receive`, `supplier`
                        where `receive`.`supplier_id` = `supplier`.`id` and `receive`.`status` = '2' and `receive`.`id` not in (select `payment`.`ref_id` from `payment` where `payment`.`status` > 0)";
						//echo $sql;
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
                            echo "<input type='button' value='Select' onclick='window.open(\"index.php?option=payment&task=edit&id=0&ref=".$cdr['id']."\",\"_self\")' />";   
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=payment&task=edit&id=0&ref=".$cdr['id']."\",\"_self\")' />";  
                            echo "</td>";
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

    function approve() 
    {
        $id = $_REQUEST['id'];
		$sql = "select * from `payment` where `id` = '".$id."'";
		$conn = new connect();
		$res = $conn->query($sql);
		while ($cdr = $res->fetch()) 
		{
			$detail = $cdr['detail'];
			$date = $cdr['date'];
			$uid = $cdr['uid'];
			$value = $cdr['value'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <form action='index.php' method='get'>
				<table class='table'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'>Approve Payment</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Detail</td>
							<td>
							<?php
								echo $detail;
							?>
							</td>
						</tr>
						<tr>
							<td>Date</td>
							<td>
							<?php
								echo $date;
							?>
							</td>
						</tr>
						<tr>
							<td>User</td>
							<td>
							<?php
								echo $uid;
							?>
							</td>
						</tr>
						<tr>
							<td>Value</td>
							<td>
							<?php
								echo number_format($value,2);
								echo "<input type='hidden' name='value' value='".$value."' />";
							?>
							</td>
						</tr>
						<tr>
							<td>From Account</td>
							<td>	
								<select name='typ_id'>
								<?php
								$sql = "select * from `acc_typ` where `acc_typ`.`status` = '1'";
								$res = $conn->query($sql);
								while ($cdr = $res->fetch()) 
								{
									echo "<option value='".$cdr['id']."'>".$cdr['name']."</option>";
								}									
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Approve Date</td>
							<td>
								<input type = 'text' id='datepicker' name='app_id' value='' />
							</td>
						</tr>
						<tr>
							<td colspan='2' class='text-center'>
								<input type='hidden' name="option" value='payment'>
								<input type='hidden' name="task" value='approval'>
								<input type='hidden' name="id" value='<?php echo $id;?>'>
								<input type='submit' value='Save'>
								<input type='button' value='Back' onclick='window.open("index.php?option=payment&task=def","_self")'>
							</td>
						</tr>
					</tbody>
				</table>
				</form>
                </div>
            </div>
        </div>
        <?php
    }

    function approval() 
    {
        $id = $_REQUEST['id'];
        $typ_id = $_REQUEST['typ_id'];
        $app_id = $_REQUEST['app_id'];
        $value = $_REQUEST['value'];
		$conn = new connect();
		$sql = "update `payment` set `status` = '2', `app_id` = '".$app_id."', `app_id` = '".$app_id."', `uaid` = '".$_SESSION['uid']."'  where `id` = '".$id."'";
		$conn->query($sql);
        $sql = "insert into acc set typ = '4', action = 'Payment', date = '".date('Y-m-d')."', detail = 'Data from Payment Rec#".$id."', `uid` = '".$_SESSION['uid']."'";
        $acc_id = $conn->query_lastid($sql);
        $sql = "insert into `acc_detail` set `acc_id` = '".$acc_id."', `typ_id` = '9', `typ` = '1', `value` = '".$value."'";
        $res = $conn->query($sql);
        $sql = "insert into `acc_detail` set `acc_id` = '".$acc_id."', `typ_id` = '".$typ_id."', `typ` = '2', `value` = '".$value."'";
        $res = $conn->query($sql);
        if ($stat == 2)
		{
			$sql = "update payment set status = '".$stat."', `uaid` = '".$_SESSION['uid']."' where id = '".$id."' ";
            $conn->save_logs("Approve Payment#".$id, $_SESSION['uid']);
		}
		header('location:index.php?option=payment&task=def');
    }

    function edit() 
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        if ($id == 0) 
        {
            $head = "Add";
            $sql = "select * from pr where id = '".$_REQUEST['ref']."'";
            $ref = $_REQUEST['ref'];
            $res = $conn->query($sql);
            while ($cdr = $res->fetch()) 
            {
                $date = $cdr['date'];
                $supplier_id = $cdr['supplier_id'];
            }
        }
        else 
        {
            $head = "Edit";
            $sql = "select * from receive where id = '".$id."'";
            $res = $conn->query($sql);
            while ($cdr = $res->fetch()) 
            {
                $date = $cdr['date'];
                $ref = $cdr['po_id'];
                $supplier_id = $cdr['supplier_id'];
            }
        }
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
				<h2>Payment</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?> Payment</td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td>
                            <?php
                            $sql = "select * from supplier where status > '0' and `id` = '".$supplier_id."'";
                            $res = $conn->query($sql);
                            while ($cdr = $res->fetch()) 
                            {
                                echo $cdr['name'];
								echo "<input type='hidden' name='supplier' value='".$cdr['id']."' />";
                            }
                            ?>
                        </td>
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
                        <td>Reference from Receive </td>
                        <td>
                            <input name='ref' value='<?php echo $ref;?>' readonly />
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                            <input type="submit" value="Save">
                            <input type="button" value="Back" onclick="window.open('index.php?option=payment&task=def','_self')">
                            <input type="hidden" name="option" value="payment">
                            <input type="hidden" name="task" value="save">
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Cost</td>
                        <td class='text-center'>Number</td>
                    </tr>
                    <?php
                    $a = 1;
					if ($id == 0)
					{
                    $sql = "select `inventory`.`name` as `name`
                    , (
					select `po_detail`.`unit_price` from `po_detail` where `po_detail`.`status` = '1' and `inventory`.`id` = `po_detail`.`inventory_id` and `po_detail`.`po_id` = '".$ref."'
					)  as receive
                    , `inventory`.`id` as stid
                    , (
                    select `num` from `po_detail`
                    where `po_detail`.`status` > 0 
                    and `po_detail`.`inventory_id` = `inventory`.`id`
                    and `po_detail`.`po_id` = '".$ref."'
                    ) as `num`
                    from `inventory` 
                    where `inventory`.`status` > 0 having `num` <> ''";
					}
					else
					{
                    $sql = "select `inventory`.`name` as name
                    , ifnull((
					select `receive_detail`.`unit_price` from `receive_detail` where `receive_detail`.`status` = '1' and `inventory`.`id` = `receive_detail`.`inventory_id` and `receive_detail`.`receive_id` = '".$id."'
					) , `inventory`.`buy`) as receive
                    , `inventory`.`id` as stid
                    , (
                    select num from receive_detail 
                    where `receive_detail`.`status` > 0 
                    and `receive_detail`.`inventory_id` = `inventory`.`id`
                    and `receive_detail`.`receive_id` = '".$id."'
                    ) as num
                    from inventory 
                    where `inventory`.`status` > 0 having `num` <> ''";
					}
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
                        echo "<input type='hidden' name='unit_price-".$a."' value='".$cdr['receive']."' />";
						echo $cdr['receive'];
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
        </div>
        <?php
    }

    function del() 
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $stat = $_REQUEST['stat'];

			$sql = "update payment set status = '".$stat."' where id = '".$id."' ";
            if ($stat == 1)
            {
                $conn->save_logs("Active Payment#".$id, $_SESSION['uid']);
            }
            elseif ($stat == 0)
            {
                $conn->save_logs("In-Active Payment#".$id, $_SESSION['uid']);
            }
		
		
		$conn->query($sql);
		header('location:index.php?option=payment&task=def');
    }

    function save() 
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $ref = $_REQUEST['ref'];
        $supplier_id = $_REQUEST['supplier'];
        $date = $_REQUEST['date'];
    
        if ($id == 0) 
        {
            $sql = "select                
            sum(`num` * `unit_price`) as `total`               
            from `receive_detail`               
            where `receive_id` = '".$ref."'
            and `status` > 0";

        $res = $conn->query($sql);
        $value = 0;

        while ($cdr = $res->fetch())
        {
            $value = $cdr['total'];
        }
        {
            $sql = "insert into `payment` set
                `typ` = '1',
                `ref_id` = '".$ref."',
                `supplier_id` = '".$supplier_id."',
                `date` = '".$date."',
                `uid` = '".$_SESSION['uid']."',
                `detail` = 'Payment from Receive #".$ref."',
                `value` = '".$value."',
                `status` = '1'";
            $conn->query($sql);
            $conn->save_logs("Edit Payment #".$ref, $_SESSION['uid']);
        }
    
    }
            header('location:index.php?option=payment&task=def');
    }

    function det()
    {
        $conn = new connect();
		$id = $_REQUEST['id'];
		$sql = "select * from `receive` where `id` = '".$id."'";
		$res = $conn->query($sql);
		while ($cdr = $res->fetch())
		{
			$supplier = $cdr['supplier_id'];
			$date = $cdr['date'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
				<h2>Payment</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'>Payment Form</td>
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
						    $sql = "select * from `supplier` where `id` = '".$supplier."'";
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
                        <input type='button' value='Print' onclick='window.open("print.php?cat=payment&typ=all","_self")'>
                        <input type='button' value='Back' onclick='window.open("index.php?option=payment&task=def","_self")'>
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
                    , `receive_detail`.`num` as `num` 
                    , `receive_detail`.`unit_price` as `receive` 
                    from `inventory`, `receive_detail`
				    where `inventory`.`status` > 0
                    and `receive_detail`.`status` > 0
                    and `receive_detail`.`inventory_id` = `inventory`.`id`
                    and `receive_detail`.`receive_id` = '".$id."'";
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
                        echo number_format($cdr['receive'],2);
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['num'];
                        echo "<input type='hidden' name='id-".$a."' value='".$cdr['stid']."' />";
                        echo "</td>";
                        echo "<td class='text-end'>";
                        $receive = $cdr['receive'];
                        $num = $cdr['num'];
                        $total = ($receive * $num);
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
                </form>
                </div>
            </div>
        </div>
        <?php
    }
}