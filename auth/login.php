<?php require_once "../app.php"; ?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/bootstrap.css">

<title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                    
                    <?php 
                    
                        if(isset($_POST['submit'])) {
                            foreach ($_POST as $key => $value) {
                                $$key = prepareInput($_POST[$key]);
                            }

                            // validation 
                            // email: required, email, max:100 
                            // if(isRequired($email)) {
                            //     if(isEmail($email)) {
                            //         if(notMoreThan($email, 100)) {

                            //         } else {
                            //             $errors['email'] = "must be <= 100";
                            //         }
                            //     } else {
                            //         $errors['email'] = "not valid";
                            //     }
                            // } else {
                            //     $errors['email'] = "required";
                            // }

                            if (! isRequired($email)) {
                                $errors['email'] = "required";
                            } elseif (! isEmail($email)) {
                                $errors['email'] = "not valid";
                            } elseif (! lessThanEq($email, 100)) {
                                $errors['email'] = "must be <= 100";
                            }

                            // password: required, string, min:5, max:20
                            if (! isRequired($password)) {
                                $errors['password'] = "required";
                            } elseif (! isString($password)) {
                                $errors['password'] = "must be string";
                            } elseif (! moreThanEq($password, 5)) {
                                $errors['password'] = "must be >= 5";
                            } elseif (! lessThanEq($password, 20)) {
                                $errors['password'] = "must be >= 20";
                            }


                            // if all data is valid, check user in db
                            if(empty($errors)) {
                                $admin = getOne("admins", "admin_email = '$email' ");
                                if(empty($admin)) {
                                    $errors['email'] = "email is not correct";
                                } elseif(! password_verify($password, $admin['admin_password']) ) {
                                    $errors['password'] = "password is not correct";
                                } else {
                                    // complete login process 
                                    // save admin data in session 
                                    setSession('admin_id', $admin['admin_id']);
                                    setSession('admin_name', $admin['admin_name']);
                                    setSession('admin_email', $admin['admin_email']);
                                    setSession('admin_type', $admin['admin_type']);

                                    // redirect admin/index.php
                                    aredirect("index.php");
                                }
                                
                            }


                        }

                    
                    ?>

                    <div>
                        <form class="border p-5 my-3 " method="POST" action="">
                            <div class="form-group">
                                <label for="email"  class="text-dark ">Email <?php getError('email'); ?></label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password"  class="text-dark ">Password <?php getError('password'); ?></label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo URL; ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>
</body>
</html>
