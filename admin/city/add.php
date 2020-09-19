<?php require_once "../../app.php"; ?>

<?php require_once ADMIN . "inc/header.php"; ?>



<div class="container">
    <div class="row">

    <?php 
                    
        if(isset($_POST['submit'])) {
            foreach ($_POST as $key => $value) {
                $$key = prepareInput($_POST[$key]);
            }

            if (! isRequired($name)) {
                $errors['name'] = "required";
            } elseif (! isString($name)) {
                $errors['name'] = "must be string";
            } elseif (! lessThanEq($name, 100)) {
                $errors['name'] = "must be <= 100";
            }

            // if all data is valid, store city in db
            if(empty($errors)) {
                $data = [
                    'city_name' => $name
                ];
                
                $is_inserted = insert("cities", $data);

                if($is_inserted) {
                    // display success message
                } else {
                    // an 
                }
            }


        }

                    
    ?>
    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New City</h3>
            <div>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark ">City Name <?php getError('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>


    </div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>