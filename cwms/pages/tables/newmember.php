<?php

error_reporting( ~E_NOTICE ); // avoid notice

require_once './dbconfig.php';

if(isset($_POST['btnsave']))
{
    $vname = $_POST['vname'];
    $vaddress = $_POST['vaddress'];
    $contact = $_POST['contact'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $payment = $_POST['payment'];
    $bemail = $_POST['bemail'];
    $cin = $_POST['cin'];
    $tin = $_POST['tin'];
    $cst = $_POST['cst'];
    $excise = $_POST['excise'];
    $tax = $_POST['tax'];
    $amount = $_POST['amount'];
    $pan = $_POST['pan'];

    $stmt = $DB_con->prepare('INSERT INTO members(vname,vaddress,contact,phone,vemail,fax,payment,bemail,cin,tin,cst,excise,tax,bank,pan) VALUES(:vname, :vaddress, :contact,:phone, :email, :fax,:payment, :bemail, :cin,:tin, :cst, :excise,:tax, :amount, :pan)');
    $stmt->bindParam(':vname',$vname);
    $stmt->bindParam(':vaddress',$vaddress);
    $stmt->bindParam(':contact',$contact);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':fax',$fax);
    $stmt->bindParam(':payment',$payment);
    $stmt->bindParam(':bemail',$bemail);
    $stmt->bindParam(':cin',$cin);
    $stmt->bindParam(':tin',$tin);
    $stmt->bindParam(':cst',$cst);
    $stmt->bindParam(':excise',$excise);
    $stmt->bindParam(':tax',$tax);
    $stmt->bindParam(':amount',$amount);
    $stmt->bindParam(':pan',$pan);


    if($stmt->execute())
    {
        $successMSG = "new record succesfully inserted ...";
        // header("refresh:5;index.php"); // redirects image view page after 5 seconds.
        ?>
        <script type="text/javascript">
            alert("new record succesfully inserted");
        </script>

        <?php
    }
    else
    {
        $errMSG = "error while inserting....";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CWMS  </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<div class="wrapper">

    <?php include "header.php"; ?>

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CWMS New member

            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">


                    <div class="box">

                        <div class="box-body">


                            <a href="members.php" class="btn btn-success">See all members</a>
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">



                                <label class="control-label">member firstname.</label>
                                <input class="form-control" type="text" name="mfirstname" placeholder="Enter member firstname" />
                                <label class="control-label">member lastname.</label>
                                <input class="form-control" type="text" name="mlastname" placeholder="Enter member lastname" />

                                <label class="control-label">member address.</label>
                                <input class="form-control" type="text" name="maddress" placeholder="Enter member address " />

                                <label class="control-label">member phone</label>
                                <div class="row">

                                    <div class="col-md-2">
                                        <input class="form-control"  type="text" name="user_job" value="+250" readonly />
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="mphone" placeholder=" Enter member number"  />
                                    </div>

                                </div>

                                <label class="control-label">member email.</label>
                                <input class="form-control" type="text" name="memail" placeholder="Enter member email" />

                                <label class="control-label">member roles.</label>
                                <input class="form-control" type="mroles" name="role" placeholder="Enter member role" />

                                <label class="control-label">PAN number.</label></td>
                                <input class="form-control" type="text" name="pan" placeholder="Enter PAN number" />




                                <br/>
                                <button type="submit" name="btnsave" class="btn btn-info">
                                    <span class="glyphicon glyphicon-save"></span> &nbsp; Create member
                                </button>


                            </form>




                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../../plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>
</html>
