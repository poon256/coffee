<?php

class quotation
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
            <h2>Quotation</h2>
                <form action="index.php" method="get">
                <input name="searcher" value="<?php echo $searcher;?>">
                <input type="submit" value="Search">
                <?php
				if (($acl == '2') or ($acl > '5')) {
				?>
                <input type='button' value='Add' onclick='window.open("index.php?option=quotation&task=edit&id=0","_self")'>
                <?php
				}
				?>
                <input type="hidden" name="option" value="quotation">
                <input type="hidden" name="task" value="def">
                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>No.</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>Customer</th>
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
                        $sql = "select `customer`.`name` as `name`, `quotation`.`id` as `id`, `quotation`.`status` as `status`, `quotation`.`date` as `date`, (select `users`.`name` from `users` where `users`.`status` = '1' and `users`.`id` = `quotation`.`uaid`) as `uaid` from `quotation`, `customer`
                        where `quotation`.`customer_id` = `customer`.`id`";
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
                            echo "</td>";
                            if (($acl == '2') or ($acl > '5')) {
                            echo "<td>";
                            echo "<input type='button' value='Detail' onclick='window.open(\"index.php?option=quotation&task=det&id=".$cdr['id']."\",\"_self\")' />";
							if ($cdr['status'] <> 2)
                            {
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=quotation&task=edit&id=".$cdr['id']."\",\"_self\")' />";
                            echo "<input type='button' value='".$ds."' onclick='confirm_del(\"index.php?option=quotation&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
							}
							if ($cdr['status'] == 1)
                            {
                            echo "<input type='button' value='Approve' onclick='window.open(\"index.php?option=quotation&task=del&id=".$cdr['id']."&stat=2\",\"_self\")' />";
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
            $customer_id = 0;
        }
        else 
        {
            $head = "Edit";
            $sql = "select * from quotation where id = '".$id."'";
            $res = $conn->query($sql);
            while ($cdr = $res->fetch()) 
            {
                $date = $cdr['date'];
                $customer_id = $cdr['customer_id'];
            }
        }
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>quotation</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?>quotation</td>
                    </tr>
                    <tr>
                        <td>customer</td>
                        <td>
                            <select name='customer'>
                            <?php
                            $sql = "select * from customer where status > '0'";
                            $res = $conn->query($sql);
                            while ($cdr = $res->fetch()) 
                            {
                                if ($customer_id == $cdr['id']) 
                                {
                                    echo "<option value='".$cdr['id']."' selected>".$cdr['name']."</option>";
                                }
                                else 
                                {
                                    echo "<option value='".$cdr['id']."'>".$cdr['name']."</option>";
                                }
                            }
                            ?>
                            </select>
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
                        <td colspan='2' class='text-center'>
                            <input type="submit" value="Save">
                            <input type="button" value="Back" onclick="window.open('index.php?option=quotation&task=def','_self')">
                            <input type="hidden" name="option" value="quotation">
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
                    $sql = "select *, `inventory`.`name` as `name`
                    , ifnull((
					select `quotation_detail`.`unit_price` from `quotation_detail` where `quotation_detail`.`status` = '1' and `inventory`.`id` = `quotation_detail`.`inventory_id` and `quotation_detail`.`quotation_id` = '".$id."'
					) , `inventory`.`sale`) as `quotation`
                    , `inventory`.`id` as `stid`
                    , (
                    select `num` from `quotation_detail` 
                    where `quotation_detail`.`status` = '1'
                    and `quotation_detail`.`inventory_id` = `inventory`.`id`
                    and `quotation_detail`.`quotation_id` = '".$id."'
                    ) as `num`
                    from `inventory`
                    where `inventory`.`status` = '1' and `inventory`.`typ_id` = '3'";
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
                        echo "<input name='cost-".$a."' value='".$cdr['quotation']."' />";
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
 
    function save()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $customer = $_REQUEST['customer'];
        $date = $_REQUEST['date'];
        if ($id > 0) 
        {
            $sql = "update quotation set customer_id = '".$customer."', date = '".$date."' where id = '".$id."'";
            $conn->query($sql);
            $sql = "update quotation_detail set status = '0' where quotation_id = '".$id."'";
            $conn->query($sql);
			$conn->save_logs("Edit quotation #".$id,$_SESSION['uid']);
        }
        else 
        {
            $sql = "insert into quotation set customer_id = '".$customer."', date = '".$date."', `uid` = '".$_SESSION['uid']."'";
            $id = $conn->query_lastid($sql);
			$conn->save_logs("Add quotation #".$id,$_SESSION['uid']);
        }
        $limit = $_REQUEST['limit'];
        $a = 1;
        while ($a < $limit) 
        {
            if ($_REQUEST['num-'.$a] > 0) 
            {
                $sql = "insert into quotation_detail set quotation_id = '".$id."', inventory_id = '".$_REQUEST['id-'.$a]."', num = '".$_REQUEST['num-'.$a]."', unit_price = '".$_REQUEST['cost-'.$a]."'";
                $conn->query($sql);
            }
            $a++;
        }
        header("location:index.php?option=quotation&task=def");
    }
 
    function del()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $stat = $_REQUEST['stat'];
		if ($stat == 2)
		{
			$sql = "update quotation set status = '".$stat."', `uaid` = '".$_SESSION['uid']."' where id = '".$id."' ";
            $conn->save_logs("Approve quotation#".$id, $_SESSION['uid']);
		}
		else
		{
			$sql = "update quotation set status = '".$stat."' where id = '".$id."' ";
            if ($stat == 1)
            {
                $conn->save_logs("Active quotation#".$id, $_SESSION['uid']);
            }
            elseif ($stat == 0)
            {
                $conn->save_logs("In-Active quotation#".$id, $_SESSION['uid']);
            }
		}
        $conn->query($sql);
        header("location:index.php?option=quotation&task=def");
    }
 
    function det()
    {
        $conn = new connect();
		$id = $_REQUEST['id'];
		$sql = "select * from `quotation` where `id` = '".$id."'";
		$res = $conn->query($sql);
		while ($cdr = $res->fetch())
		{
			$customer = $cdr['customer_id'];
			$date = $cdr['date'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                    <h2>quotation</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'>quotation Form</td>
                    </tr>
                    <tr>
                        <td>Doc ID</td>
                        <td>
                            <?php echo $id;?>
                        </td>
                    </tr>
                    <tr>
                        <td>customer</td>
                        <td>
                            <?php
						    $sql = "select * from `customer` where `id` = '".$customer."'";
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
                            <input type="button" value="Back" onclick="window.open('index.php?option=quotation&task=def','_self')">
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
                    , `quotation_detail`.`num` as `num` 
                    , `quotation_detail`.`unit_price` as `withdrawn` 
                    from `inventory`, `quotation_detail`
				    where `inventory`.`status` > 0
                    and `quotation_detail`.`status` > 0
                    and `quotation_detail`.`inventory_id` = `inventory`.`id`
                    and `quotation_detail`.`quotation_id` = '".$id."'";
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
                        echo number_format($cdr['withdrawn'],2);
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['num'];
                        echo "<input type='hidden' name='id-".$a."' value='".$cdr['stid']."' />";
                        echo "</td>";
                        echo "<td class='text-end'>";
                        $withdrawn = $cdr['withdrawn'];
                        $num = $cdr['num'];
                        $total = ($withdrawn * $num);
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

?>