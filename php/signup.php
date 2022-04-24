<?php
    session_start();
    include "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
    {
        //check user email valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //check user email already exists in database or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0)
            {   //email already exists
                echo "$email - email already exists!";
            }else
            {
                //check user upload file or not
                if(isset($_FILES['image'])) // if file is uploaded
                {
                    $img_name = $_FILES['image']['name']; // get user uploaded img name
                    $temp_name = $_FILES['image']['tmp_name']; // this temp name is used to save/move file in out folder
                    
                    // explode img and get extension type
                    $img_explode = explode('.', $img_name);
                    $img_extension = end($img_explode); // get the extension of an user image file
                    
                    $extensions = ['png', 'jpeg', 'jpg']; // valid extenions
                    if(in_array($img_extension, $extensions) === true)
                    {
                        $time = time(); //return the current time
                                        //we need this time because when you upload user  img into our folder we rename file with current time so all the img file will have a unique name
                        
                        $new_img_name = $time.$img_name;
                        if (move_uploaded_file($temp_name, "images/$new_img_name"))
                        {
                            $status = "Active"; //once user signed up his status will appear
                            $random_id = rand(time(), 10000000); //create random id for user

                            //insert all user data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){
                                // if successfuly inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0)
                                {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user uniqe_idin other php file
                                    echo "success";
                                }
                            }else{
                                echo "Something went wrong";
                            }
                        }

                    }else
                    {
                        echo "Please select an image file of type [png, jpeg, jpg]";
                    }
                }else
                {
                    echo "Please select an image file!";
                }
            }


        }else{
            echo "$email - This is not a valid email!";
        }
    }else{
        echo "All input field are required";
    }