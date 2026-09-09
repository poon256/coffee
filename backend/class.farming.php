<?php

class farming
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
                <h2>Farming</h2>

                <form action="index.php" method="get">
                    <input name="searcher" value="<?php echo $searcher;?>">
                    <input type="submit" value="Search">

                    <?php
                    if (($acl == '2') or ($acl > '5'))
                    {
                    ?>
                        <input type='button'
                        value='Add'
                        onclick='window.open("index.php?option=farming&task=add","_self")'>
                    <?php
                    }
                    ?>

                    <input type="hidden" name="option" value="farming">
                    <input type="hidden" name="task" value="def">
                </form>

                <table id='datatable' class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th class='text-center'>No.</th>
                            <th class='text-center'>Batch</th>
                            <th class='text-center'>Date</th>
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
                    $a = 1;
                    $sql = "select`farming`.`id` as `id`,`farming`.`batch_id` as `batch_id`,`farming`.`status` as `status`,`farming`.`date` as `date`,
                    (select `users`.`name` from `users` where `users`.`status` = '1'and `users`.`id` = `farming`.`uaid`) as `uaid`
                    from `farming`, `batch` where `farming`.`batch_id` = `batch`.`id`";

                    if ($searcher <> null)
                    {
                        $sql = $sql." and `farming`.`id` like '%".$searcher."%' ";
                    }

                    $res = $conn->query($sql);

                    while ($cdr = $res->fetch())
                    {
                        echo "<tr>";
                        echo "<td>";
                        echo $a;
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['batch_id'];
                        echo "</td>";
                        echo "<td>";
                        echo $cdr['date'];
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
                        if (($acl == '2') or ($acl > '5'))
                        {
                            echo "<td>";
                            echo "<input type='button'
                            value='Detail'
                            onclick='window.open(\"index.php?option=farming&task=det&id=".$cdr['id']."\",\"_self\")' />";
                            if ($cdr['status'] <> 2)
                            {
                                echo "<input type='button'
                                value='Edit'
                                onclick='window.open(\"index.php?option=farming&task=edit&id=".$cdr['id']."\",\"_self\")' />";

                                echo "<input type='button'
                                value='".$ds."'
                                onclick='confirm_del(\"index.php?option=farming&task=del&id=".$cdr['id']."&stat=".$dss."\")' />";
                            }
                            if ($cdr['status'] == 1)
                            {
                                echo "<input type='button'
                                value='Approve'
                                onclick='window.open(\"index.php?option=farming&task=del&id=".$cdr['id']."&stat=2\",\"_self\")' />";
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


    function add()
    {
    $conn = new connect();
    ?>

    <div class='container'>
        <div class='row'>
            <div class='col-12'>
                <h3>
                    Select Batch to Farming
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
                            <th class='text-center'>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $a = 1;

                    $sql = "select`batch`.`id` as `id`,`batch`.`detail` as `detail`,`batch`.`status` as `status`,`batch`.`date` as `date`,
                    (select `users`.`name` from `users` where `users`.`status` = '1' and `users`.`id` = `batch`.`uaid`
                    ) as `uaid` from `batch`, `batch_detail` where `batch_detail`.`batch_id` = `batch`.`id`
                    and `batch_detail`.`typ` = '1' and `batch`.`status` = '2' and `batch`.`id` not in
                    (select `farming`.`batch_id` from `farming` where `farming`.`status` > 0)
                    group by `batch`.`id`";

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

                        echo "<input type='button'
                        value='Select'
                        onclick='window.open(\"index.php?option=farming&task=edit&id=0&ref=".$cdr['id']."\",\"_self\")' />";

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


    function edit()
    {
        $conn = new connect();

        $id = $_REQUEST['id'];

        if ($id == 0)
        {
            $head = "Add";

            $sql = "select * from `batch` where `id` = '".$_REQUEST['ref']."'";
            $ref = $_REQUEST['ref'];
            $res = $conn->query($sql);
            while ($cdr = $res->fetch())
            {
                $date = $cdr['date'];
            }
        }
        else
        {
            $head = "Edit";

            $sql = "select *
            from `farming`
            where `id` = '".$id."'";

            $res = $conn->query($sql);

            while ($cdr = $res->fetch())
            {
                $date = $cdr['date'];
                $ref = $cdr['batch_id'];
            }
        }

        ?>

        <div class='container'>

            <div class='row'>

                <div class='col-12'>

                <form action="index.php" method="get">

                <table class='table table-bordered table-striped'>

                    <tr>
                        <td colspan='2' class='text-center'>
                            <?php echo $head;?> Farming
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
                            <input type='text' id='datepicker' name='date' value='<?php echo $date;?>'>
                        </td>
                    </tr>

                    <tr>
                        <td>Reference from batch</td>
                        <td>
                            <input name='ref' value='<?php echo $ref;?>'readonly />
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'>
                            <input type="submit" value="Save">
                            <input type="button" value="Back"onclick="window.open('index.php?option=farming&task=def','_self')">
                            <input type="hidden" name="option" value="farming">
                            <input type="hidden" name="task" value="save">
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
                    if ($id == 0)
                    {
                        $sql = "select `inventory`.`name` as `name`,`inventory`.`sale` as `farming`,`inventory`.`id` as `stid`,
                        (select `batch_detail`.`num` from `batch_detail` where `batch_detail`.`status` > 0 and `batch_detail`.`typ` = '1'
                        and `batch_detail`.`inventory_id` = `inventory`.`id` and `batch_detail`.`batch_id` = '".$ref."' limit 1
                        ) as `num` from `inventory` where `inventory`.`status` > 0 having `num` is not null";
                    }
                    else
                    {
                        $sql = "select `inventory`.`name` as `name`,`inventory`.`sale` as `farming`,`inventory`.`id` as `stid`,
                        (select `farming_detail`.`num` from `farming_detail` where `farming_detail`.`status` > 0
                        and `farming_detail`.`inventory_id` = `inventory`.`id` and `farming_detail`.`farming_id` = '".$id."'
                        order by `farming_detail`.`id` desc limit 1) as `num` from `inventory`
                        where `inventory`.`status` > 0 and exists
                        (select 1 from `farming_detail` where `farming_detail`.`status` > 0 and `farming_detail`.`inventory_id` = `inventory`.`id`
                        and `farming_detail`.`farming_id` = '".$id."') and exists
                        (select 1 from `batch_detail` where `batch_detail`.`status` > 0 and `batch_detail`.`typ` = '1' and `batch_detail`.`inventory_id` = `inventory`.`id`
                        and `batch_detail`.`batch_id` = '".$ref."')";
                    }


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

                        echo "<input type='number' name='num-".$a."'value='".$num."' />";
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
        $ref = $_REQUEST['ref'];


        if ($id > 0)
        {
            $sql = "update `farming` set `date` = '".$date."',`batch_id` = '".$ref."' where `id` = '".$id."'";

            $conn->query($sql);

            $sql = "update `farming_detail` set `status` = '0' where `farming_id` = '".$id."'";

            $conn->query($sql);

            $conn->save_logs("Edit farming #".$id,$_SESSION['uid']);
        }
        else
        {
            $sql = "insert into `farming` set `date` = '".$date."',`batch_id` = '".$ref."',`uid` = '".$_SESSION['uid']."'";

            $id = $conn->query_lastid($sql);

            $conn->save_logs("Add farming #".$id,$_SESSION['uid']);
        }


        $limit = $_REQUEST['limit'];

        $a = 1;

        while ($a < $limit)
        {
            if ($_REQUEST['num-'.$a] > 0)
            {
                $sql = "insert into `farming_detail`set `farming_id` = '".$id."',`inventory_id` = '".$_REQUEST['id-'.$a]."',`num` = '".$_REQUEST['num-'.$a]."'";
                $conn->query($sql);
            }

            $a++;
        }
        header("location:index.php?option=farming&task=def");
    }


    function del()
    {
        $conn = new connect();

        $id = $_REQUEST['id'];
        $stat = $_REQUEST['stat'];


        if ($stat == 2)
        {
            $sql = "update `farming`
            set `status` = '".$stat."',
                `uaid` = '".$_SESSION['uid']."'
            where `id` = '".$id."'";

            $conn->query($sql);

            $conn->save_logs(
                "Appove farming#".$id,
                $_SESSION['uid']
            );
        }
        else
        {
            $sql = "update `farming`
            set `status` = '".$stat."'
            where `id` = '".$id."'";

            $conn->query($sql);

            if ($stat == 1)
            {
                $conn->save_logs(
                    "Active farming#".$id,
                    $_SESSION['uid']
                );
            }
            elseif ($stat == 0)
            {
                $conn->save_logs(
                    "In-Active farming#".$id,
                    $_SESSION['uid']
                );
            }
        }


        header("location:index.php?option=farming&task=def");
    }


    function det()
    {
        $conn = new connect();

        $id = $_REQUEST['id'];

        $sql = "select *
        from `farming`
        where `id` = '".$id."'";

        $res = $conn->query($sql);

        while ($cdr = $res->fetch())
        {
            $date = $cdr['date'];
            $batch_id = $cdr['batch_id'];
        }

        ?>

        <div class='container'>

            <div class='row'>

                <div class='col-12'>

                    <h2>farming</h2>

                    <form action="index.php" method="get">

                    <table class='table table-bordered table-striped'>

                        <tr>
                            <td colspan='2' class='text-center'>
                                farming Form
                            </td>
                        </tr>

                        <tr>
                            <td>Doc ID</td>
                            <td>
                                <?php echo $id;?>
                            </td>
                        </tr>

                        <tr>
                            <td>Batch</td>
                            <td>
                                <?php echo $batch_id;?>
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
                                <input type="button"value="Back"onclick="window.open('index.php?option=farming&task=def','_self')">
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

                        $sql = "select
                        `inventory`.`name` as `name`,
                        `inventory`.`id` as `stid`,
                        `farming_detail`.`num` as `num`

                        from `inventory`, `farming_detail`

                        where `inventory`.`status` > 0
                        and `farming_detail`.`status` > 0
                        and `farming_detail`.`inventory_id` = `inventory`.`id`
                        and `farming_detail`.`farming_id` = '".$id."'";

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
                            echo "</td>";

                            echo "</tr>";

                            $a++;
                        }

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