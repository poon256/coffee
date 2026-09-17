<?php

class acc_typ
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
                <h2>Accounting Type</h2>
                <form action='index.php' method='get'>
                <input name='searcher' value='<?php echo $searcher;?>'>
                <input type='submit' value='Search'>
				<?php
					if (($acl == '2') or ($acl > '5'))
					{
					?>
                        <input type='button' value='Add' onclick='window.open("index.php?option=acc_typ&task=edit&id=0","_self")'>
					<?php
					}
				?>
                <input type='hidden' name='option' value='acc_typ'>
                <input type='hidden' name='task' value='def'>
                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>Id</th>
                            <th class='text-center'>Type</th>
                            <th class='text-center'>Root</th>
                            <th class='text-center'>Order</th>
                            <th class='text-center'>Name</th>

                    <?php
					    if (($acl == '2') or ($acl > '5')) {
					?>
                        <th class='text-center'>Action</th>
					<?php
					}
                    ?>

                    </thead>
                    <tbody>
                        <?php
                        $sql = 'select * from `acc_typ`';
                        if ($searcher <> null)
                        {
                            $sql = $sql."where `name` like '%".$searcher."%'";
                        }
                        $conn = new connect();
                        $res = $conn->query($sql);
                        while ($cdr = $res->fetch())
                        {
                            echo "<tr>";
                            echo "<td>";
                            echo $cdr['id'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['typ'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['root'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['ord'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['name'];

                            echo "</td>";
                            if (($acl == '2') or ($acl > '5'))
							{
                            echo "<td>";
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=acc_typ&task=edit&id=".$cdr['id']."\",\"_self\")' />";
						    echo "<input type='button' value='Del' onclick='confirm_del(\"index.php?option=acc_typ&task=del&id=".$cdr['id']."&stat=0\")' />";
						    echo "<input type='button' value='Detail' onclick='window.open(\"index.php?option=acc_typ&task=det&id=".$cdr['id']."\",\"_self\")' />";
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

    function edit() 
    {
        $conn = new connect();
        $id = $_REQUEST['id'];
        if ($id == 0) 
        {
            $head = "Add";
            $typ = "";
            $root = "";
            $ord = "";
            $name = "";
            $detail = "";
        }
        else 
        {
            $head = "Edit";
            $sql = "select * from acc_typ where id = '".$id."'";
            $res = $conn->query($sql);
            while ($cdr = $res->fetch()) 
            {
                $typ = $cdr['typ'];
                $root = $cdr['root'];
                $ord = $cdr['ord'];
                $name = $cdr['name'];
                $detail = $cdr['detail'];
            }
        }
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>Accounting Type</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'><?php echo $head;?> Accounying Type List</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <select name='typ'>
								<option value='1'>1</option>
								<option value='2'>2</option>
                                <option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Root</td>
                        <td>
                            <input name='root' value="<?php echo $root;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Order</td>
                        <td>
                            <input name='ord' value="<?php echo $ord;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input name='name' value="<?php echo $name;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Detail</td>
                        <td>
                            <input name='detail' value="<?php echo $detail;?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                            <input type="submit" value="Save">
                            <input type="button" value="Back" onclick="window.open('index.php?option=acc_typ&task=def','_self')">
                            <input type="hidden" name="option" value="acc_typ">
                            <input type="hidden" name="task" value="save">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                        </td>
                    </tr>
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
        $typ = $_REQUEST['typ'];
        $root = $_REQUEST['root'];
        $ord = $_REQUEST['ord'];
        $name = $_REQUEST['name'];
        $detail = $_REQUEST['detail'];
        if ($id > 0) 
        {
            $sql = "update acc_typ set typ = '".$typ."', root = '".$root."', ord = '".$ord."', name = '".$name."', detail = '".$detail."' where id = '".$id."'";
            $conn->query($sql);
        }
        else 
        {
            $sql = "insert into acc_typ set typ = '".$typ."', root = '".$root."', ord = '".$ord."', name = '".$name."', detail = '".$detail."'";
            $conn->query($sql);
			$sql = "select * from acc_typ where typ = '".$typ."' and root = '".$root."' and ord = '".$ord."' and name = '".$name."' and detail = '".$detail."'";
			$res = $conn->query($sql);
			while ($cdr = $res->fetch()) 
			{
				$id = $cdr['id'];
			}
        }
        header("location:index.php?option=acc_typ&task=def&id=".$id);
    }

    function del() 
    {
        $id = $_REQUEST['id'];
		$sql = "update `acc_typ` set `status` = '".$_REQUEST['stat']."' where `id` = '".$id."'";
		$conn = new connect();
		$conn->query($sql);
		header('location:index.php?option=acc_typ&task=def');
    }

    function det() 
    {
        $id = $_REQUEST['id'];
		$sql = "select * from `acc_typ` where `id` = '".$id."'";
		$conn = new connect();
		$res = $conn->query($sql);
		while ($cdr = $res->fetch()) 
		{
			$acc_typ = $cdr['typ'];
            $name = $cdr['name'];
            $root = $cdr['root'];
            $ord = $cdr['ord'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>Accounting Type</h2>
                <form action="index.php" method="get">
                <table class='table table-bordered table-striped'>
                    <tr>
                        <td colspan='2' class='text-center'>acc_typ Data</td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>
                            <?php echo $id;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <?php
						    $sql = "select * from `acc_typ` where `id` = '".$acc_typ."'";
						    $res = $conn->query($sql);
						    while ($cdr = $res->fetch())
						    {
							    echo $cdr['typ'];
						    }
					        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Root</td>
                        <td>
                            <?php echo $root;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Order</td>
                        <td>
                            <?php echo $ord;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <?php echo $name;?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                        <input type="button" value="Back" onclick="window.open('index.php?option=acc_typ&task=def','_self')">
                        </td>
                    </tr>
                </form>
                </div>
            </div>
        </div>
        <?php
    }

    function sum() 
    {
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
                <center>
                <?php
                    echo "acc_typ Summary";
                ?>
                <form action='index.php' method='get'>
                <input name='searcher' value='<?php echo $searcher;?>'>
                <input type='submit' value='Search'>
                <input type='hidden' name='option' value='acc_typ'>
                <input type='hidden' name='task' value='sum'>
                </form>
                </center>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>No.</th>
                            <th class='text-center'>Name</th>
                            <th class='text-center'>Summary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select *,
                        ifnull((select (`sale_detail`.`num` * `stock`.`sale`) as sum from `sale`, `sale_detail`, stock where `sale`.`id` = `sale_detail`.`sale_id`
                        and `sale_detail`.`stock_id` = `stock`.`id` and `sale`.`acc_typ_id` = `acc_typ`.`id`),0) as sum from `acc_typ`";
                        if ($searcher <> null)
                        {
                            $sql = $sql."where `name` like '%".$searcher."%'";
                        }
                        $conn = new connect();
                        $res = $conn->query($sql);
                        while ($cdr = $res->fetch())
                        {
                            echo "<tr>";
                            echo "<td class='text-center'>";
                            echo $cdr['id'];
                            echo "</td>";
                            echo "<td class='text-center'>";
                            echo $cdr['name'];
                            echo "</td>";
                            echo "<td class='text-end'>";
                            echo number_format($cdr['sum'],2);
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <center><input type='button' value='Back' onclick='window.open("index.php?option=acc_typ&task=def","_self")'></center>
                </div>
            </div>
        </div>
        <?php
    }

}

?>