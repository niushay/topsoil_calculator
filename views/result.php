<?php require 'header.php' ?>
    <!-- Main Content-->
    <div class="container-main container">
        <div class="row">
            <h5 class="container_header">
                Number Of Bags Of Topsoil =  <?php echo $bagsCount ?>
            </h5>
        </div>
        <hr>

        <h5>Prices Of Bags = ₤<i id="cost"><?php echo $cost ?></i></h5>
        <hr>

        <h5>
            Total Amount Payable = ₤<i id="total"><?php echo $totalAmount ?> </i>
        </h5>

        <a href="#" id="add-to-basket" class="btn btn-success mt-2">
            <i class="fa fa-shopping-basket"></i>  Add To Basket
        </a>

        <a href="/" class="btn btn-warning mt-2">
            <i class="fa fa-home"></i>  Return Home
        </a>
    </div>

    <!-- End Main Content -->
    <script>
        $(function () {
            $("#add-to-basket").on('click', function () {
                $.ajax({
                    type: "POST",
                    url: '/add-to-basket',
                    data: {'cost' : $("#cost").text()},
                    success: function (data){
                        console.log(data)
                        $("#total").text(data)
                    },
                });
            })
        })

    </script>
<?php require 'footer.php' ?>