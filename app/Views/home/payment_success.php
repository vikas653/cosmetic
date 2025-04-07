<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Payment Success - Kwality</title>

        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php include("common/header_lib.php") ?>
        <style>
            #main {
                margin-top: 5rem;
                margin-bottom: 5rem;
            }
            #wrapper-site {
                width: 412.5pt;
            }
            .text-center {
                text-align: center!important;
            }
        </style>
    </head>

    <body id="product-detail">
        <?php include("common/header.php") ?>

        <!-- main content -->
        <div class="main-content">
            <div class="container">

                <div class="breadcrumbs style2">
                    <a href="<?php echo base_url(); ?>">Home</a>
                    <span>Payment</span>
                </div>
            </div>
            <!-- main -->
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="col-md-6 onecol">
                        <table class="table table-bordered">
                            <tr>
                                <td>Order ID</td>
                                <td><?php echo $payment_history["ORDERID"];?></td>
                            </tr>
                            <tr>
                                <td>Txn ID</td>
                                <td><?php echo $payment_history["TXNID"];?></td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td><?php echo $payment_history["CURRENCY"];?></td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td><?php echo $payment_history["TXNAMOUNT"];?></td>
                            </tr>
                            <tr>
                                <td>Payment</td>
                                <td><i class="btn btn-xs btn-success">Success</i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <?php include("common/footer.php") ?>
        <?php include("common/footer_lib.php") ?>
        <script>
            $(document).ready(function() {

                $.validator.addMethod("pwcheck", function(value) {
                    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                            && /[a-z]/.test(value) // has a lowercase letter
                            && /\d/.test(value) // has a digit
                });

                $('#signinform').validate();

            });
        </script>
    </body>

</html>