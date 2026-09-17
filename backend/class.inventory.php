<?php

class inventory
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
                <h2>inventory</h2>
                <form action='index.php' method='get'>
                <input name='searcher' value='<?php echo $searcher;?>'>
                <input type='submit' value='Search'>			
				<?php
					if (($acl == '2') or ($acl > '5'))
					{
					?>
						<input type='button' value='Add' onclick='window.open("index.php?option=inventory&task=edit&id=0","_self")'>
					<?php
					}
				?>
                <input type='hidden' name='option' value='inventory'>
                <input type='hidden' name='task' value='def'>


                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>Id</th>
                            <th class='text-center'>Name</th>
							<th class='text-center'>Type</th>
                            <th class='text-center'>Category</th>
                            <th class='text-center'>Sale</th>
                            <th class='text-center'>Critical Point</th>
                            <th class='text-center'>Status</th>
                <?php
					if (($acl == '2') or ($acl > '5'))
					{
					?>
                            <th class='text-center'>Action</th>
					<?php
					}
				?>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'select `inventory`.`id` as `id`, `inventory`.`name` as `name`,`inventory_typ`.`name` as `typ`, 
                        `inventory_cat`.`name` as `cat`, `inventory`.`sale` as `sale`, `inventory`.`cp` as `cp`,
                        `inventory`.`status` as `status` from `inventory`, `inventory_typ`,
                        `inventory_cat`
                         where `inventory`.`typ_id` = `inventory_typ`.`id` and `inventory`.`cate_id` = `inventory_cat`.`id` ';
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
                            echo $cdr['name'];
                            echo "</td>";
							echo "<td>";
                            echo $cdr['typ'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['cat'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['sale'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['cp'];
                            echo "</td>";
                            echo "<td>";
                            if ($cdr['status'] == 1) 
                            {
                                echo "Active";
                                $ds = "In-Active";
                                $dss = "0";
                            }
                            else
                            {
                                echo "In-Active";
                                $ds = "Active";
                                $dss = "1";
                            }
                            echo "</td>";
                            if (($acl == '2') or ($acl > '5')) {
                            echo "<td>";
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=inventory&task=edit&id=".$cdr['id']."\",\"_self\")' />";
						    echo "<input type='button' value='".$ds."' onclick='confirm_del(\"index.php?option=inventory&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
						    echo "<input type='button' value='Detail' onclick='window.open(\"index.php?option=inventory&task=det&id=".$cdr['id']."\",\"_self\")' />";
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
        $id = $_REQUEST['id'];
        if ($id == 0) 
        {
            $name = "";
            $typ_id = "";
            $cate_id = "";
            $sale = "";
            $cp = "";
            $img = "" ;
        }
        else 
        {
            $sql = "select * from `inventory` where `id` = '".$id."'";
            $conn = new connect();
            $res = $conn->query($sql);
            while ($cdr = $res->fetch()) 
            {
                $name = $cdr['name'];
                $typ_id = $cdr['typ_id'];
                $cate_id = $cdr['cate_id'];
                $sale = $cdr['sale'];
                $cp = $cdr['cp'];
            }
        }
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>inventory</h2>
                <form action='index.php' method='get'>
				<table class='table'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'>Edit Data</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Name</td>
							<td>
								<input name='name' value='<?php echo $name;?>'>
							</td>
						</tr>
						<tr>
                        <td>Type</td>
                        <td>
                            <select name='typ_id'>
                                    <option value="">ประเภท</option>
                                    <?php
                                    $conn = new connect();
                                    $sql_typ = "select id, name from inventory_typ  where status = 1";
                                    $res_typ = $conn->query($sql_typ);
                                    while ($st = $res_typ->fetch()) {
                                        $selected = ($st['id'] == $typ_id) ? "selected" : "";
                                        echo "<option value='".$st['id']."' $selected>".$st['name']."</option>";
                                        }
                                        ?>
                            </select>
                        </td>
                    </tr>
                        <tr>
							<td>Category</td>
                            <td>
                            <select name='cate_id'>
                                    <option value="">เมล็ด</option>
                                    <?php
                                    $conn = new connect();
                                    $sql_cat = "select id, name from inventory_cat  where status = 1";
                                    $res_cat = $conn->query($sql_cat);
                                    while ($st = $res_cat->fetch()) {
                                        $selected = ($st['id'] == $cate_id) ? "selected" : "";
                                        echo "<option value='".$st['id']."' $selected>".$st['name']."</option>";
                                        }
                                        ?>
                            </select>
                        </td>
						</tr>
                        <tr>
							<td>Sale</td>
							<td>
								<input name='sale' value='<?php echo $sale;?>'>
							</td>
						</tr>
                        <tr>
							<td>Critical Point</td>
							<td>
								<input name='cp' value='<?php echo $cp;?>'>
							</td>
						</tr>

						<tr>
							<td colspan='2' class='text-center'>
								<input type='hidden' name="option" value='inventory'>
								<input type='hidden' name="task" value='save'>
								<input type='hidden' name="id" value='<?php echo $id;?>'>
								<input type='submit' value='Save'>
								<input type='button' value='Back' onclick='window.open("index.php?option=inventory&task=def","_self")'>
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

    function del() 
    {
        $id = $_REQUEST['id'];
		$sql = "update `inventory` set `status` = '".$_REQUEST['stat']."' where `id` = '".$id."'";
		$conn = new connect();
		$conn->query($sql);
		header('location:index.php?option=inventory&task=def');
    }

    function save() 
    {
        $id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$typ_id = $_REQUEST['typ_id'];
		$cate_id = $_REQUEST['cate_id'];
        $sale = $_REQUEST['sale'];
        $cp = $_REQUEST['cp'];

		if ($id == 0) 
		{
			$sql = "insert into `inventory` set `name` = '".$name."', `typ_id` = '".$typ_id."', `cate_id` = '".$cate_id."', `sale` = '".$sale."', `cp` = '".$cp."' ";
		}
		else 
		{
			$sql = "update `inventory` set `name` = '".$name."', `typ_id` = '".$typ_id."', `cate_id` = '".$cate_id."', `sale` = '".$sale."', `cp` = '".$cp."' where `id` = '".$id."'";
		}
		$conn = new connect();
		$conn->query($sql);
		header('location:index.php?option=inventory&task=def');
    }

    function savetyp() 
    {
        $id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$detail = $_REQUEST['detail'];
		if ($id == 0) 
		{
			$sql = "insert into `inventory` set `name` = '".$name."', `detail` = '".$detail."'";
		}
		else 
		{
			$sql = "update `inventory` set `name` = '".$name."', `detail` = '".$detail."' where `id` = '".$id."'";
		}
		$conn = new connect();
		$conn->query($sql);
		header('location:index.php?option=inventory&task=def');
    }

    function det() 
    {
        $id = $_REQUEST['id'];
		$sql = "select * from `inventory` where `id` = '".$id."'";
		$conn = new connect();
		$res = $conn->query($sql);
		while ($cdr = $res->fetch()) 
		{
			$name = $cdr['name'];
            $typ_id = $cdr['typ_id'];
            $cate_id = $cdr['cate_id'];
            $sale = $cdr['sale'];
            $cp = $cdr['cp'];
		}
        ?>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                <h2>inventory</h2>
                <table class='table'>
					<thead>
						<tr>
							<th colspan='2' class='text-center'>inventory Data</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $name;?>
							</td>
						</tr>
						<tr>
							<td>Type</td>
							<td>
								<?php echo $typ_id;?>
							</td>
						</tr>
                        <tr>
							<td>category</td>
							<td>
								<?php echo $cate_id;?>
							</td>
						</tr>
                        <tr>
							<td>Sale</td>
							<td>
								<?php echo $sale;?>
							</td>
						</tr>
                        <tr>
							<td>Critical Point</td>
							<td>
								<?php echo $cp;?>
							</td>
						</tr>
						<tr>
							<td colspan='2' class='text-center'>
								<input type='button' value='Back' onclick='window.open("index.php?option=inventory&task=def","_self")'>
							</td>
						</tr>
					</tbody>
				</table>
                </div>
            </div>
        </div>
        <?php
    }
}

?>