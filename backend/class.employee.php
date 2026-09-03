<?php

class employee
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
                <h2>Employee Management</h2>
                <form action='index.php' method='get'>
                <input name='searcher' value='<?php echo $searcher;?>'>
                <input type='submit' value='Search'>			
				<?php
					if (($acl == '2') or ($acl > '5'))
					{
					?>
						<input type='button' value='Add' onclick='window.open("index.php?option=employee&task=edit&id=0","_self")'>
                        <input type='button' value='leave' onclick='window.open("index.php?option=employee&task=leave&id=0","_self")'>
                        <input type='button' value='leave_detail' onclick='window.open("index.php?option=employee&task=leave_def&id=0","_self")'>
					<?php
					}
				?>
                <input type='hidden' name='option' value='employee'>
                <input type='hidden' name='task' value='def'>


                </form>
                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>Id</th>
                            <th class='text-center'>Name</th>
							<th class='text-center'>Surname</th>
                            <th class='text-center'>Telephone</th>
                            <th class='text-center'>E-mail</th>
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
                        $sql = 'select * from `employee_info`';
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
                            echo $cdr['fname'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['lname'];
                            echo "</td>";
							echo "<td>";
                            echo $cdr['tel'];
                            echo "</td>";
                            echo "<td>";
                            echo $cdr['mail'];
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
                            echo "<input type='button' value='Edit' onclick='window.open(\"index.php?option=employee&task=edit&id=".$cdr['id']."\",\"_self\")' />";
						    echo "<input type='button' value='".$ds."' onclick='confirm_del(\"index.php?option=employee&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
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
        $head = "Add";

        $fname = "";
        $lname = "";
        $nickname = "";
        $depart = "";
        $birt = "";
        $sex = "";
        $address = "";
        $tel = "";
        $mail = "";
        $start = "";
    }
    else 
    {
        $head = "Edit";

        $sql = "select * from `employee_info` where `id` = '".$id."'";
        $conn = new connect();
        $res = $conn->query($sql);

        while ($cdr = $res->fetch()) 
        {
            $fname = $cdr['fname'];
            $lname = $cdr['lname'];
            $nickname = $cdr['nickname'];
            $depart = $cdr['depart'];
            $birt = $cdr['birt'];
            $sex = $cdr['sex'];
            $address = $cdr['address'];
            $tel = $cdr['tel'];
            $mail = $cdr['mail'];
            $start = $cdr['start'];
        }
    }
?>
<div class='container'>
    <div class='row'>
        <div class='col-12'>

            <h2>Employee Management</h2>

            <form action='index.php' method='get'>

                <table class='table table-bordered table-striped'>

                    <thead>
                        <tr>
                            <th colspan='2' class='text-center'>
                                <?php echo $head; ?> Employee
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>First Name</td>
                            <td>
                                <input type='text'
                                       name='fname'
                                       value='<?php echo $fname; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Last Name</td>
                            <td>
                                <input type='text'
                                       name='lname'
                                       value='<?php echo $lname; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Nickname</td>
                            <td>
                                <input type='text'
                                       name='nickname'
                                       value='<?php echo $nickname; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Department</td>
                            <td>
                                <input type='text'
                                       name='depart'
                                       value='<?php echo $depart; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Birth Date</td>
                            <td>
                                <input type='date'
                                       name='birt'
                                       value='<?php echo $birt; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Sex</td>
                            <td>
                                <select name='sex'>

                                    <option value=''>-- Select --</option>

                                    <option value='Male'
                                        <?php if ($sex == 'Male') echo 'selected'; ?>>
                                        Male
                                    </option>

                                    <option value='Female'
                                        <?php if ($sex == 'Female') echo 'selected'; ?>>
                                        Female
                                    </option>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Address</td>
                            <td>
                                <textarea name='address'
                                          rows='3'><?php echo $address; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Tel</td>
                            <td>
                                <input type='tel'
                                       name='tel'
                                       value='<?php echo $tel; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Mail</td>
                            <td>
                                <input type='email'
                                       name='mail'
                                       value='<?php echo $mail; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td>Start Date</td>
                            <td>
                                <input type='date'
                                       name='start'
                                       value='<?php echo $start; ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td colspan='2' class='text-center'>

                                <input type='hidden'
                                       name='option'
                                       value='employee'>

                                <input type='hidden'
                                       name='task'
                                       value='save'>

                                <input type='hidden'
                                       name='id'
                                       value='<?php echo $id; ?>'>

                                <input type='submit'
                                       value='Save'>

                                <input type='button'
                                       value='Back'
                                       onclick="window.open('index.php?option=employee&task=def','_self')">

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
		$sql = "update `employee_info` set `status` = '".$_REQUEST['stat']."' where `id` = '".$id."'";
		$conn = new connect();
		$conn->query($sql);
		header('location:index.php?option=employee&task=def');
    }


    function save() 
    {
        $id = $_REQUEST['id'];
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $nickname = $_REQUEST['nickname'];
        $depart = $_REQUEST['depart'];
        $birt = $_REQUEST['birt'];
        $sex = $_REQUEST['sex'];
        $address = $_REQUEST['address'];
        $tel = $_REQUEST['tel'];
        $mail = $_REQUEST['mail'];
        $start = $_REQUEST['start'];

        $conn = new connect();

        if ($id == 0) 
        {
            $sql = "insert into `employee_info` set
            `fname` = '".$fname."',  
            `lname` = '".$lname."',   
            `nickname` = '".$nickname."',    
            `depart` = '".$depart."',     
            `birt` = '".$birt."',     
            `sex` = '".$sex."',     
            `address` = '".$address."',       
            `tel` = '".$tel."',      
            `mail` = '".$mail."',          
            `start` = '".$start."',          
            `status` = '1'";
            }
            else 
                {
                $sql = "update `employee_info` set
                `fname` = '".$fname."',
                `lname` = '".$lname."',
                `nickname` = '".$nickname."',
                `depart` = '".$depart."',
                `birt` = '".$birt."',
                `sex` = '".$sex."',
                `address` = '".$address."',
                `tel` = '".$tel."',
                `mail` = '".$mail."',
                `start` = '".$start."'
                where `id` = '".$id."'";
        }

    $conn->query($sql);

    header('location:index.php?option=employee&task=def');
}


function leave()
{
    $conn = new connect();
    $id = $_REQUEST['id'];

    $head = "Add Leave";

    $emp_id = "";
    $purpose = "";
    $reason = "";
    $leave_start = "";
    $leave_end = "";
    $typ = 1;

    // ถ้าเป็นการแก้ไขใบลา
    if ($id > 0)
    {
        $sql = "select * from `leave_management` 
                where `id` = '".$id."'";
        $res = $conn->query($sql);

        while ($cdr = $res->fetch())
        {
            $head = "Edit Leave";
            $emp_id = $cdr['emp_id'];
            $purpose = $cdr['purpose'];
            $reason = $cdr['reason'];
            $leave_start = $cdr['leave_start'];
            $leave_end = $cdr['leave_end'];
            $typ = $cdr['typ'];
        }
    }
?>
<div class='container'>
    <div class='row'>
        <div class='col-12'>

        <h2><?php echo $head; ?></h2>

        <form action='index.php' method='get'>

        <table class='table table-bordered table-striped'>

            <tr>
                <td colspan='2' class='text-center'>
                    Leave Request
                </td>
            </tr>

            <tr>
                <td>Employee</td>
                <td>
                    <select name='emp_id'>

                    <?php
                    $sql = "select * from `employee_info`
                            where `status` = '1'
                            order by `fname`";

                    $res = $conn->query($sql);

                    while ($cdr = $res->fetch())
                    {
                        echo "<option value='".$cdr['id']."'";

                        if ($emp_id == $cdr['id'])
                        {
                            echo " selected";
                        }

                        echo ">".$cdr['fname']." ".$cdr['lname'];

                        if ($cdr['nickname'] <> "")
                        {
                            echo " (".$cdr['nickname'].")";
                        }

                        echo "</option>";
                    }
                    ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Leave Type</td>
                <td>
                    <select name='typ'>
                        <option value='1' <?php if ($typ == 1) echo "selected"; ?>>
                            Sick Leave
                        </option>

                        <option value='2' <?php if ($typ == 2) echo "selected"; ?>>
                            Personal Leave
                        </option>

                        <option value='3' <?php if ($typ == 3) echo "selected"; ?>>
                            Vacation Leave
                        </option>

                        <option value='4' <?php if ($typ == 4) echo "selected"; ?>>
                            Other
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Purpose</td>
                <td>
                    <input type='text'
                           name='purpose'
                           value='<?php echo $purpose; ?>'>
                </td>
            </tr>

            <tr>
                <td>Reason</td>
                <td>
                    <textarea name='reason'
                              rows='3'><?php echo $reason; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Leave Start</td>
                <td>
                    <input type='date'
                           name='leave_start'
                           value='<?php echo $leave_start; ?>'>
                </td>
            </tr>

            <tr>
                <td>Leave End</td>
                <td>
                    <input type='date'
                           name='leave_end'
                           value='<?php echo $leave_end; ?>'>
                </td>
            </tr>

            <tr>
                <td>User</td>
                <td>
                    <?php echo $_SESSION['uname']; ?>
                </td>
            </tr>

            <tr>
                <td colspan='2' class='text-center'>

                    <input type='hidden'
                           name='option'
                           value='employee'>

                    <input type='hidden'
                           name='task'
                           value='save_leave'>

                    <input type='hidden'
                           name='id'
                           value='<?php echo $id; ?>'>

                    <input type='submit'
                           value='Save'>

                    <input type='button'
                           value='Back'
                           onclick="window.open(
                           'index.php?option=employee&task=def',
                           '_self')">

                </td>
            </tr>

        </table>

        </form>

        </div>
    </div>
</div>

<?php
}

function save_leave()
{
    $conn = new connect();

    $id = $_REQUEST['id'];
    $emp_id = $_REQUEST['emp_id'];
    $purpose = $_REQUEST['purpose'];
    $reason = $_REQUEST['reason'];
    $leave_start = $_REQUEST['leave_start'];
    $leave_end = $_REQUEST['leave_end'];
    $typ = $_REQUEST['typ'];

    $adate = date("Y-m-d");

    $uid = $_SESSION['uid'];

    if ($id == 0)
    {
        $sql = "insert into `leave_management` set
                `emp_id` = '".$emp_id."',
                `uid` = '".$uid."',
                `adate` = '".$adate."',
                `purpose` = '".$purpose."',
                `reason` = '".$reason."',
                `leave_start` = '".$leave_start."',
                `leave_end` = '".$leave_end."',
                `typ` = '".$typ."',
                `status` = '1'";

        $conn->query($sql);
    }
    else
    {
        $sql = "update `leave_management` set
                `emp_id` = '".$emp_id."',
                `purpose` = '".$purpose."',
                `reason` = '".$reason."',
                `leave_start` = '".$leave_start."',
                `leave_end` = '".$leave_end."',
                `typ` = '".$typ."'
                where `id` = '".$id."'";

        $conn->query($sql);
    }

    header('location:index.php?option=employee&task=def');
}

function leave_def()
{
    $conn = new connect();
    $acl = $conn->check_acl();

    ?>

    <div class='container'>
        <div class='row'>
            <div class='col-12'>

                <h2>Leave Management</h2>

                <input type='button'
                       value='Add Leave'
                       onclick='window.open("index.php?option=employee&task=leave&id=0","_self")'>

                <input type='button'
                       value='Back'
                       onclick='window.open("index.php?option=employee&task=def","_self")'>

                <br><br>

                <table id='datatable'
                       class='table table-bordered table-striped'>

                    <thead>
                        <tr>
                            <th class='text-center'>Id</th>
                            <th class='text-center'>Employee</th>
                            <th class='text-center'>Type</th>
                            <th class='text-center'>Purpose</th>
                            <th class='text-center'>Reason</th>
                            <th class='text-center'>Start</th>
                            <th class='text-center'>End</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center'>Status</th>
                            <th class='text-center'>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $sql = "select
                            `leave_management`.*,
                            `employee_info`.`fname`,
                            `employee_info`.`lname`,
                            `employee_info`.`nickname`
                            from `leave_management`
                            left join `employee_info`
                            on `employee_info`.`id` = `leave_management`.`emp_id`
                            order by `leave_management`.`id` desc";

                    $res = $conn->query($sql);

                    while ($cdr = $res->fetch())
                    {

                        echo "<tr>";

                        echo "<td>";
                        echo $cdr['id'];
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['fname']." ".$cdr['lname'];

                        if ($cdr['nickname'] <> "")
                        {
                            echo " (".$cdr['nickname'].")";
                        }

                        echo "</td>";

                        echo "<td>";

                        if ($cdr['typ'] == 1)
                        {
                            echo "Sick Leave";
                        }
                        elseif ($cdr['typ'] == 2)
                        {
                            echo "Personal Leave";
                        }
                        elseif ($cdr['typ'] == 3)
                        {
                            echo "Vacation Leave";
                        }
                        else
                        {
                            echo "Other";
                        }

                        echo "</td>";

                        echo "<td>";
                        echo $cdr['purpose'];
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['reason'];
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['leave_start'];
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['leave_end'];
                        echo "</td>";

                        echo "<td>";
                        echo $cdr['adate'];
                        echo "</td>";

                        echo "<td>";

                        if ($cdr['status'] == 1)
                        {
                            echo "Active";
                        }
                        else
                        {
                            echo "Cancelled";
                        }

                        echo "</td>";

                        echo "<td>";

                        if ($cdr['status'] == 1)
                        {
                            echo "<input type='button'
                                   value='Edit'
                                   onclick='window.open(\"index.php?option=employee&task=leave&id=".$cdr['id']."\",\"_self\")'>";

                            echo " ";

                            echo "<input type='button'
                                   value='Del'
                                   onclick='confirm_del(\"index.php?option=employee&task=del_leave&id=".$cdr['id']."\")'>";
                        }

                        echo "</td>";

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

}

?>