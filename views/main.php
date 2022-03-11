<?php require 'header.php' ?>
    <!-- Main Content-->
    <div class="container-main container">
        <div class="row mb-4">
            <h6 class="container_header">Calculate the number of bags of topsoil!</h6>
        </div>
        <form action="/calculate" method="post">
            <div class="row mb-4">
                <div class="col-md-6">
                    <select class="form-control" name="measurement_unit" required>
                        <option value="" disabled selected>Measurement Unit ...</option>
                        <option value="meter">Metres</option>
                        <option value="feet">Feet</option>
                        <option value="yard">Yards</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="depth_unit" required>
                        <option value="" disabled selected>Depth Measurement Unit ...</option>
                        <option value="centimeter">Centimetres</option>
                        <option value="inch">Inches</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="number" class="form-control" name="length" placeholder="Length" required>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="width" placeholder="Width" required>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-success">Calculate</button>
            </div>
    </div>
    <!-- End Main Content -->
<?php require 'footer.php' ?>