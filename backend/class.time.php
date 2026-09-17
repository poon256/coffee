<?php

class time
{
    function def()
    {
        $conn = new connect();
        $acl = $conn->check_acl();

        ?>

        <div class='container'>
            <div class='row'>
                <div class='col-12'>

                    <h2>Time Stamp</h2>

                    <?php

                    if ($acl == '3')
                    {
                        $emp_id = $_SESSION['uid'];

                        $sql = "select *
                                from `employee_info`
                                where `id` = '".$emp_id."'";

                        $res = $conn->query($sql);

                        $emp_name = "";

                        while ($cdr = $res->fetch())
                        {
                            $emp_name = $cdr['fname']." ".$cdr['lname'];

                            if (isset($cdr['nickname']) && $cdr['nickname'] != "")
                            {
                                $emp_name .= " (".$cdr['nickname'].")";
                            }
                        }

                        ?>

                        <table class='table table-bordered table-striped'>

                            <tr>
                                <td>Employee</td>
                                <td>
                                    <?php echo $emp_name; ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan='2' class='text-center'>

                                    <input type='button'
                                           value='IN'
                                           onclick='window.open("index.php?option=time&task=save&inout=1","_self")'>

                                    <input type='button'
                                           value='OUT'
                                           onclick='window.open("index.php?option=time&task=save&inout=2","_self")'>

                                </td>
                            </tr>

                        </table>

                        <?php
                    }

                    if (($acl == '2') or ($acl > '5'))
                    {
                        ?>

                        <h3>Employee Time Stamp</h3>

                        <table id='datatable'
                               class='table table-bordered table-striped'>

                            <thead>
                                <tr>
                                    <th class='text-center'>No.</th>
                                    <th class='text-center'>Employee</th>
                                    <th class='text-center'>IN</th>
                                    <th class='text-center'>OUT</th>
                                    <th class='text-center'>ID</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php

                            $a = 1;

                            $sql = "select
                                        `timestamp`.`id` as id,
                                        `timestamp`.`emp_id` as emp_id,
                                        `timestamp`.`in` as time_in,
                                        `timestamp`.`out` as time_out,
                                        `employee_info`.`fname` as fname,
                                        `employee_info`.`lname` as lname
                                    from `timestamp`
                                    left join `employee_info`
                                    on `employee_info`.`id` = `timestamp`.`emp_id`
                                    where `timestamp`.`status` = '1'
                                    order by `timestamp`.`id` desc";

                            $res = $conn->query($sql);

                            while ($cdr = $res->fetch())
                            {
                                echo "<tr>";

                                echo "<td class='text-center'>";
                                echo $a;
                                echo "</td>";

                                echo "<td>";
                                echo $cdr['fname']." ".$cdr['lname'];
                                echo "</td>";

                                echo "<td class='text-center'>";
                                if ($cdr['time_in'] != null && $cdr['time_in'] != "")
                                {
                                    echo $cdr['time_in'];
                                }
                                else
                                {
                                    echo "-";
                                }
                                echo "</td>";

                                echo "<td class='text-center'>";
                                if ($cdr['time_out'] != null && $cdr['time_out'] != "")
                                {
                                    echo $cdr['time_out'];
                                }
                                else
                                {
                                    echo "-";
                                }
                                echo "</td>";

                                echo "<td class='text-center'>";
                                echo $cdr['id'];
                                echo "</td>";

                                echo "</tr>";

                                $a++;
                            }

                            ?>

                            </tbody>

                        </table>

                        <?php
                    }

                    ?>

                </div>
            </div>
        </div>

        <?php
    }

    function save()
    {
        $conn = new connect();

        $emp_id = $_SESSION['uid'];

        if (isset($_REQUEST['inout']))
        {
            $inout = $_REQUEST['inout'];
        }
        else
        {
            $inout = 0;
        }

        if ($inout != 1 && $inout != 2)
        {
            header('location:index.php?option=time&task=def');
            exit;
        }

        $date_time = date('Y-m-d H:i:s');

        if ($inout == 1)
        {
            $sql = "insert into `timestamp`
                    (`emp_id`, `in`, `out`, `status`)
                    values
                    ('".$emp_id."', '".$date_time."', null, '1')";

            $conn->query($sql);
        }
        elseif ($inout == 2)
        {
            $sql = "select `id`
                    from `timestamp`
                    where `emp_id` = '".$emp_id."'
                    and `status` = '1'
                    and `out` is null
                    order by `id` desc
                    limit 1";

            $res = $conn->query($sql);

            if ($cdr = $res->fetch())
            {
                $id = $cdr['id'];

                $sql = "update `timestamp`
                        set `out` = '".$date_time."'
                        where `id` = '".$id."'";

                $conn->query($sql);
            }
        }

        header('location:index.php?option=time&task=def');
        exit;
    }
}

?>