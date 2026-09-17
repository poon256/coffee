<?php

class payroll
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

            <h2>Payroll Employee</h2>

            <form action='index.php' method='get'>

                <input name='searcher'
                       value='<?php echo $searcher; ?>'>

                <input type='submit' value='Search'>

                <?php
                if (($acl == '2') or ($acl > '5'))
                {
                ?>
                    <input type='button'value='Add'onclick='window.open("index.php?option=payroll&task=edit&id=0","_self")'>
                    <input type='button' value='Payroll'onclick='window.open("index.php?option=payroll&task=payroll&id=0","_self")'>
                <?php
                }
                ?>

                <input type='hidden'
                       name='option'
                       value='payroll'>

                <input type='hidden'
                       name='task'
                       value='def'>

            </form>


            <table id='datatable'
                   class='table table-bordered table-striped'>

                <thead>

                    <tr>

                        <th class='text-center'>Id</th>

                        <th class='text-center'>
                            First Name
                        </th>

                        <th class='text-center'>
                            Last Name
                        </th>

                        <th class='text-center'>
                            Salary
                        </th>

                        <th class='text-center'>
                            Year
                        </th>

                        <th class='text-center'>
                            Status
                        </th>

                        <?php
                        if (($acl == '2') or ($acl > '5'))
                        {
                        ?>

                        <th class='text-center'>
                            Action
                        </th>

                        <?php
                        }
                        ?>

                    </tr>

                </thead>


                <tbody>

<?php

$sql = "select
            payroll.id as id,
            employee_info.fname as fname,
            employee_info.lname as lname,
            payroll.salary as salary,
            payroll.year as year,
            payroll.status as status
        from payroll
        left join employee_info
        on employee_info.id = payroll.emp_id
        where 1=1";


if ($searcher != null)
{
    $sql .= " and (employee_info.fname like '%".$searcher."%'or employee_info.lname like '%".$searcher."%')";
}


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
    echo number_format($cdr['salary'], 2);
    echo "</td>";

    echo "<td>";
    echo $cdr['year'];
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


    if (($acl == '2') or ($acl > '5'))
    {

        echo "<td>";

        echo "<input type='button'
                value='Edit'
                onclick='window.open(\"index.php?option=payroll&task=edit&id=".$cdr['id']."\",\"_self\")'>";


        echo "<input type='button'
                value='".$ds."'
                onclick='confirm_del(\"index.php?option=payroll&task=del&id=".$cdr['id']."&stat=".$dss."\")'>";


        echo "<input type='button'
                value='Detail'
                onclick='window.open(\"index.php?option=payroll&task=det&id=".$cdr['id']."\",\"_self\")'>";

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

        $emp_id = "";
        $salary = "";
        $year = date("Y");
        $status = "1";

        $conn = new connect();


        if ($id > 0)
        {

            $sql = "select *
                    from payroll
                    where id = '".$id."'";

            $res = $conn->query($sql);

            while ($cdr = $res->fetch())
            {
                $emp_id = $cdr['emp_id'];
                $salary = $cdr['salary'];
                $year = $cdr['year'];
                $status = $cdr['status'];
            }
        }
?>

<div class='container'>
    <div class='row'>
        <div class='col-12'>

            <h2>
                <?php
                if ($id == 0)
                {
                    echo "Add Payroll";
                }
                else
                {
                    echo "Edit Payroll";
                }
                ?>
            </h2>


            <form action='index.php' method='get'>

                <table class='table table-bordered table-striped'>


                    <!-- Employee -->

                    <tr>

                        <td>
                            Employee
                        </td>

                        <td>

                            <select name='emp_id'
                                    required>

                                <option value=''>
                                    -- Select Employee --
                                </option>

<?php
$sql_emp = "select *
            from employee_info
            where status = '1'
            order by fname,lname";

$res_emp = $conn->query($sql_emp);


while ($emp = $res_emp->fetch())
{

    $selected = "";

    if ($emp['id'] == $emp_id)
    {
        $selected = "selected";
    }


    echo "<option value='".$emp['id']."' ".$selected.">";

    echo $emp['fname']." ".$emp['lname'];

    if ($emp['nickname'] != "")
    {
        echo " (".$emp['nickname'].")";
    }

    echo "</option>";
}
?>
</select></td>
                    </tr>

                    <tr>
                        <td>Salary</td>
                        <td>
                            <input type='number'name='salary'value='<?php echo $salary; ?>'step='0.01'min='0'required>บาท / เดือน
                        </td>
                    </tr>


                    <tr>
                        <td>Year</td>
                        <td>
                            <input type='number'name='year'value='<?php echo $year; ?>'min='2000'required>
                        </td>
                    </tr>


                    <tr>
                        <td>Status</td>
                        <td>
                            <select name='status'>
                                <option value='1'
                                <?php
                                if ($status == 1)
                                {
                                    echo "selected";
                                }
                                ?>>
                                    Active
                                </option>


                                <option value='0'
                                <?php
                                if ($status == 0)
                                {
                                    echo "selected";
                                }
                                ?>>
                                    In-Active
                                </option>

                            </select>

                        </td>

                    </tr>

                    <tr>
                        <td colspan='2'class='text-center'>
                            <input type='hidden' name='option' value='payroll'>
                            <input type='hidden'name='task'value='save'>
                            <input type='hidden'name='id'value='<?php echo $id; ?>'>
                            <input type='submit'value='Save'>
                            <input type='button'value='Back'onclick='window.open("index.php?option=payroll&task=def","_self")'>
                        </td>
                    </tr>
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
        $emp_id = $_REQUEST['emp_id'];
        $salary = $_REQUEST['salary'];
        $year = $_REQUEST['year'];
        $status = $_REQUEST['status'];
        if ($id == 0)
        {
            $sql = "insert into payroll set emp_id = '".$emp_id."',salary = '".$salary."',year = '".$year."',status = '".$status."'";
            $conn->query($sql);
        }
        else
        {
            $sql = "update payroll set emp_id = '".$emp_id."',salary = '".$salary."',year = '".$year."',status = '".$status."' where id = '".$id."'";
            $conn->query($sql);
        }


        header('location:index.php?option=payroll&task=def');
    }

    function del()
    {
        $id = $_REQUEST['id'];
        $stat = $_REQUEST['stat'];
        $sql = "update payroll set status = '".$stat."'where id = '".$id."'";
        $conn = new connect();
        $conn->query($sql);
        header('location:index.php?option=payroll&task=def');
    }


    function det()
    {
        $conn = new connect();

        $id = $_REQUEST['id'];


        $sql = "select payroll.id as id,payroll.emp_id as emp_id,payroll.salary as salary,payroll.year as year,payroll.status as status,employee_info.fname as fname,employee_info.lname as lname,employee_info.nickname as nickname,employee_info.depart as depart
                from payroll left join employee_info
                on employee_info.id = payroll.emp_id
                where payroll.id = '".$id."'";


        $res = $conn->query($sql);


        while ($cdr = $res->fetch())
        {
?>

<div class='container'>
    <div class='row'>
        <div class='col-12'>

            <h2>Payroll Detail</h2>


            <table class='table table-bordered table-striped'>
                <tr>
                    <td>Payroll ID</td>
                    <td><?php echo $cdr['id']; ?></td>
                </tr>


                <tr>
                    <td>Employee</td>
                    <td>
                        <?php
                        echo $cdr['fname']." ".$cdr['lname'];
                        if ($cdr['nickname'] != "")
                        {
                            echo " (".$cdr['nickname'].")";
                        }

                        ?>
                    </td>
                </tr>


                <tr>
                    <td>Department</td>
                    <td>
                        <?php
                        echo $cdr['depart'];
                        ?>
                    </td>
                </tr>


                <tr>
                    <td>Salary</td>
                    <td>
                        <?php
                        echo number_format(
                            $cdr['salary'],
                            2
                        );
                        ?> บาท / เดือน
                    </td>
                </tr>

                <tr>
                    <td>Year</td>
                    <td><?phpecho $cdr['year'];?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <?php
                        if ($cdr['status'] == 1)
                        {
                            echo "Active";
                        }
                        else
                        {
                            echo "In-Active";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'
                        class='text-center'>
                        <input type='button'value='Back'onclick='window.open("index.php?option=payroll&task=def","_self")'>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>

<?php
        }
    }

function payroll()
{
    $conn = new connect();

    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;

    $fname = "";
    $lname = "";
    $nickname = "";
    $depart = "";
    $salary = "";


    if ($id > 0)
    {
        $sql = "select
                    employee_info.fname,
                    employee_info.lname,
                    employee_info.nickname,
                    employee_info.depart
                from employee_info
                where employee_info.id = '".$id."'";

        $res = $conn->query($sql);

        while ($cdr = $res->fetch())
        {
            $fname = $cdr['fname'];
            $lname = $cdr['lname'];
            $nickname = $cdr['nickname'];
            $depart = $cdr['depart'];
        }

        $sql_salary = "select salary
                       from payroll
                       where emp_id = '".$id."'
                       and status = '1'
                       order by year desc
                       limit 1";

        $res_salary = $conn->query($sql_salary);

        while ($sal = $res_salary->fetch())
        {
            $salary = $sal['salary'];
        }
    }
?>

<div class='container'>
    <div class='row'>
        <div class='col-12'>

            <h2>Employee Payroll</h2>
            <form action='index.php' method='get'>
                <table class='table table-bordered table-striped'>

                    <tr>
                        <td>Employee</td>
                        <td>
                            <select name='id' onchange='this.form.submit()' required>
                                <option value=''>
                                    Select Employee
                                </option>
                                <?php
                                $sql_emp = "select *from employee_info where status = '1' order by fname,lname";
                                $res_emp = $conn->query($sql_emp);
                                while ($emp = $res_emp->fetch())
                                    {
                                $selected = "";
                                if ($emp['id'] == $id)
    
                                    {
                                    $selected = "selected";
                                    }
                                    echo "<option value='".$emp['id']."' ".$selected.">";
                                    echo $emp['fname']." ".$emp['lname'];
                                    if ($emp['nickname'] != "")
                                        {
                                        echo " (".$emp['nickname'].")";
                                        }
                                        echo "</option>";
                                        }
?>
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td>Department</td>
                        <td>
                            <?php echo $depart; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Payment Date</td>
                        <td>
                            <input type='date'name='date'value='<?php echo date("Y-m-d"); ?>'required>
                        </td>
                    </tr>

                    <tr>
                        <td>Amount</td>
                        <td>
                            <input type='number'name='value'value='<?php echo $salary; ?>'step='0.01'min='0'required>
                        </td>
                    </tr>

                    <tr>
                        <td>Detail</td>
                        <td>
                            <input type='text'name='detail'value='Salary Payment'required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                            <input type='hidden'name='option'value='payroll'>
                            <input type='hidden'name='task'value='payroll'>
                            <?php if ($id > 0) { ?>
                            <input type='submit'
                            formaction='index.php'name='task'value='save_payroll'>
                            <?php } ?>
                            <input type='button'value='Back'onclick='window.open("index.php?option=payroll&task=def","_self")'>

                        </td>
                    </tr>

                </table>

            </form>

        </div>
    </div>
</div>

<?php
}
    function save_payroll()
    {
        $conn = new connect();
        $emp_id = $_REQUEST['id'];
        $date = $_REQUEST['date'];
        $value = $_REQUEST['value'];
        $detail = $_REQUEST['detail'];
        $uid = $_SESSION['uid'];

        $sql = "select * from employee_info where id = '".$emp_id."'";

        $res = $conn->query($sql);
        $emp_name = "";
        while ($cdr = $res->fetch())
        {
            $emp_name =$cdr['fname']." ".$cdr['lname'];
        }

        $sql = "insert into acc set uid = '".$uid."',date = '".$date."',typ = '4',action = 'Payment',detail = 'Payroll ".$emp_name."',status = '1'";


        $acc_id =$conn->query_lastid($sql);
        $sql = "insert into acc_detail set acc_id = '".$acc_id."',typ_id = '9',typ = '1',value = '".$value."',status = '1'";


        $conn->query($sql);
        $sql = "insert into acc_detail set acc_id = '".$acc_id."',typ_id = '1',typ = '2',value = '".$value."',status = '1'";


        $conn->query($sql);
        header('location:index.php?option=payroll&task=def');
    }

}

?>