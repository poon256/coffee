<?php

class batch
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
            <h2>batch</h2>
                <form action="index.php" method="get">
                <input name="searcher" value="<?php echo $searcher;?>">
                <input type="submit" value="Search">
                <?php
				if (($acl == '2') or ($acl > '5')) {
				?>
                <input type='button' value='Farm' onclick='window.open("index.php?option=batch&task=farm&id=0","_self")'>
                <?php
				}

				if (($acl == '2') or ($acl > '5')) {
				?>
                <input type='button' value='Prod' onclick='window.open("index.php?option=batch&task=prod&id=0","_self")'>
                <?php
				}
				?>
                <input type="hidden" name="option" value="batch">
                <input type="hidden" name="task" value="def">
                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>No.</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>Process</th>
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
                        $sql = "select`batch`.`id` as `id`,`batch`.`status` as `status`,`batch`.`date` as `date`,
                        (select `batch_detail`.`typ` from `batch_detail` where `batch_detail`.`batch_id` = `batch`.`id` and `batch_detail`.`status` > 0 
                        limit 1) as `typ`,
                        (select `users`.`name` from `users` where `users`.`status` = '1' and `users`.`id` = `batch`.`uaid`) as `uaid`
                        from `batch` where `batch`.`status` > 0 and exists (select 1 from `batch_detail` where `batch_detail`.`batch_id` = `batch`.`id`
                        and `batch_detail`.`status` > 0 )";
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
                            if ($cdr['typ'] == 1)
                            {
                                echo "Send to the farm";
                            }
                            elseif ($cdr['typ'] == 2)
                            {
                                echo "Send to the production.";
                            }
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
                            echo "<input type='button' value='Detail' onclick='window.open(\"index.php?option=batch&task=det&id=".$cdr['id']."\",\"_self\")' />";
                            if ($cdr['status'] <> 2)
                                {
                                    if ($cdr['typ'] == 1)
                                {
                                    echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=batch&task=farm&id=".$cdr['id']."\",\"_self\")' />";
                                }
                                    elseif ($cdr['typ'] == 2)
                                        {
                                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=batch&task=prod&id=".$cdr['id']."\",\"_self\")' />";
                                        }
                                            echo "<input type='button' value='".$ds."' onclick='confirm_del(\"index.php?option=batch&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
                                        }
							if ($cdr['status'] == 1)
                            {
                            echo "<input type='button' value='Approve' onclick='window.open(\"index.php?option=batch&task=del&id=".$cdr['id']."&stat=2\",\"_self\")' />";
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
 
    function farm()
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
            $sql = "select * from batch where id = '".$id."'";
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
                <h2>Batch</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?> Batch</td>
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
                            <input type="button" value="Back" onclick="window.open('index.php?option=batch&task=def','_self')">
                            <input type="hidden" name="option" value="batch">
                            <input type="hidden" name="task" value="save_farm">
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Number</td>
                    </tr>
                    <?php
                    $a = 1;
                    $sql = "select `inventory`.`id` as `stid`,`inventory`.`name` as `name`,                      
                    ifnull((select `batch_detail`.`typ` from `batch_detail`                           
                    where `batch_detail`.`status` = '1' and `batch_detail`.`inventory_id` = `inventory`.`id`
                    and `batch_detail`.`batch_id` = '".$id."'),0) as `typ`,                                
                    ifnull((select `batch_detail`.`num`                                         
                    from `batch_detail`                                  
                    where `batch_detail`.`status` = '1'                           
                    and `batch_detail`.`inventory_id` = `inventory`.`id`                                
                    and `batch_detail`.`batch_id` = '".$id."'                                
                    limit 1                                  
                    ),                                    
                    0                              
                    ) as `num`                          
                    from `inventory`                          
                    where `inventory`.`status` = '1'                            
                    and `inventory`.`typ_id` = '2'                            
                    order by `inventory`.`name`";
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


        function prod()
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
            $sql = "select * from batch where id = '".$id."'";
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
                <h2>Batch</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?> Batch</td>
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
                            <input type="button" value="Back" onclick="window.open('index.php?option=batch&task=def','_self')">
                            <input type="hidden" name="option" value="batch">
                            <input type="hidden" name="task" value="save_prod">
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Number</td>
                    </tr>
                    <?php
                    $a = 1;
                    $sql = "select `inventory`.`id` as `stid`,`inventory`.`name` as `name`,                      
                    ifnull((select `batch_detail`.`typ` from `batch_detail`                           
                    where `batch_detail`.`status` = '1' and `batch_detail`.`inventory_id` = `inventory`.`id`
                    and `batch_detail`.`batch_id` = '".$id."'),0) as `typ`,                                
                    ifnull((select `batch_detail`.`num`                                         
                    from `batch_detail`                                  
                    where `batch_detail`.`status` = '1'                           
                    and `batch_detail`.`inventory_id` = `inventory`.`id`                                
                    and `batch_detail`.`batch_id` = '".$id."'                                
                    limit 1                                  
                    ),                                    
                    0                              
                    ) as `num`                          
                    from `inventory`                          
                    where `inventory`.`status` = '1'                            
                    and `inventory`.`typ_id` = '3'                            
                    order by `inventory`.`name`";
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
 
    function save_farm()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $date = $_REQUEST['date'];
        if ($id > 0) 
        {
            $sql = "update batch set date = '".$date."' where id = '".$id."'";
            $conn->query($sql);
            $sql = "update batch_detail set status = '0' where batch_id = '".$id."'";
            $conn->query($sql);
            $conn->save_logs("Edit Batch #".$id,$_SESSION['uid']);
        }
        else 
        {
            $sql = "insert into batch set date = '".$date."', `uid` = '".$_SESSION['uid']."'";
            $id = $conn->query_lastid($sql);
            $conn->save_logs("Add Batch #".$id,$_SESSION['uid']);
        }
        $limit = $_REQUEST['limit'];
        $a = 1;
        while ($a < $limit) 
        {
            if ($_REQUEST['num-'.$a] > 0) 
            {
                $sql = "insert into batch_detail set batch_id = '".$id."',typ = '1' ,inventory_id = '".$_REQUEST['id-'.$a]."', num = '".$_REQUEST['num-'.$a]."'";
                $conn->query($sql);
            }
            $a++;
        }
        header("location:index.php?option=batch&task=def");
    }


    function save_prod()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $date = $_REQUEST['date'];
        if ($id > 0) 
        {
            $sql = "update batch set date = '".$date."' where id = '".$id."'";
            $conn->query($sql);
            $sql = "update batch_detail set status = '0' where batch_id = '".$id."'";
            $conn->query($sql);
            $conn->save_logs("Edit Batch #".$id,$_SESSION['uid']);
        }
        else 
        {
            $sql = "insert into batch set date = '".$date."', `uid` = '".$_SESSION['uid']."'";
            $id = $conn->query_lastid($sql);
            $conn->save_logs("Add Batch #".$id,$_SESSION['uid']);
        }
        $limit = $_REQUEST['limit'];
        $a = 1;
        while ($a < $limit) 
        {
            if ($_REQUEST['num-'.$a] > 0) 
            {
                $sql = "insert into batch_detail set batch_id = '".$id."',typ = '2' ,inventory_id = '".$_REQUEST['id-'.$a]."', num = '".$_REQUEST['num-'.$a]."'";
                $conn->query($sql);
            }
            $a++;
        }
        header("location:index.php?option=batch&task=def");
    }
 
 
    function del()
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        $stat = $_REQUEST['stat'];
		if ($stat == 2)
		{
			$sql = "update batch set status = '".$stat."', `uaid` = '".$_SESSION['uid']."' where id = '".$id."' ";
            $conn->save_logs("Approve batch#".$id, $_SESSION['uid']);
		}
		else
		{
			$sql = "update batch set status = '".$stat."' where id = '".$id."' ";
            if ($stat == 1)
            {
                $conn->save_logs("Active batch#".$id, $_SESSION['uid']);
            }
            elseif ($stat == 0)
            {
                $conn->save_logs("In-Active batch#".$id, $_SESSION['uid']);
            }
		}
        $conn->query($sql);
        header("location:index.php?option=batch&task=def");
    }
 
    function det()
    {
        $conn = new connect();
		$id = $_REQUEST['id'];
		$sql = "select * from `batch` where `id` = '".$id."'";
		$res = $conn->query($sql);
		while ($cdr = $res->fetch())
		{
			$date = $cdr['date'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                    <h2>batch</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'>batch Form</td>
                    </tr>
                    <tr>
                        <td>Doc ID</td>
                        <td>
                            <?php echo $id;?>
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
                            <input type="button" value="print" onclick="window.open('print.php?cat=batch&typ=det&id=<?php echo $id;?>','_self')">
                            <input type="button" value="Back" onclick="window.open('index.php?option=batch&task=def','_self')">
                        </td>
                    </tr>
                </table>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td class='text-center'>No.</td>
                        <td class='text-center'>Name</td>
                        <td class='text-center'>Number</td>
                    </tr>
                    <?php
                    $a = 1;
                    $net = 0;
                    $sql = "select `inventory`.`name` as name
                    , `inventory`.`id` as stid
                    , `batch_detail`.`num` as `num` 
                    from `inventory`, `batch_detail`
				    where `inventory`.`status` > 0
                    and `batch_detail`.`status` > 0
                    and `batch_detail`.`inventory_id` = `inventory`.`id`
                    and `batch_detail`.`batch_id` = '".$id."'";
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
                        echo "<td>";
                        echo $cdr['num'];
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

}

?>