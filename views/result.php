<?php require 'header.php' ?>
    <!-- Main Content-->
    <div class="container-main container">
        <div class="row">
            <p class="result">
                Number of bags of topsoil =  <?php echo $bagsCount ?>
            </p>
        </div>

        <p class="result">Bags price = ₤<i id="cost"><?php echo $cost ?></i> (inc VAT)</p>
        <hr>

        <h5 class="total-basket">Total amount payable = ₤<i id="total"><?php echo $totalAmount ?> </i></h5>

        <a href="#" id="add-to-basket" class="btn btn-success mt-4">
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