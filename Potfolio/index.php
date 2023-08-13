<?php
    //include database_conection.php file to connect to DB
    include ("database/database_conection.php"); 

    if (isset($_POST['submit'])) {
        $userName = '';
        $email = '';
        $contactNumber = '';
        $message = '';

        $errors = []; // Array to store validation errors

        // Validate $userName
        if (empty($_POST['userName'])) {
            $errors['userName'] = "Username is required.";
        } else {
            $userName = $_POST['userName'];

            // Validate $email
            if (empty($_POST['email'])) {
                $errors['email'] = "Email is required.";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            } else {
                $email = $_POST['email'];

                // Validate $contactNumber
                if (empty($_POST['contactNumber'])) {
                    $errors['contactNumber'] = "Contact number is required.";
                } elseif (!preg_match('/^\d{10}$/', $_POST['contactNumber'])) {
                    $errors['contactNumber'] = "Invalid contact number format. It should be 10 digits.";
                } else {
                    $contactNumber = $_POST['contactNumber'];

                    // Validate $messege (typo in variable name should be corrected)
                    if (empty($_POST['message'])) {
                        $errors['message'] = "Message is required.";
                    } else {
                        $message = $_POST['message'];
                    }
                }
            }
        }

        if (empty($errors)) {
            // All data is valid, proceed with further processing
            // For example, sending an email or saving data to a database
            $sql = "INSERT INTO demo_table
                VALUES ('$userName', '$email', '$contactNumber', '$message')";
            // $sql = "INSERT INTO your_table_name (column1, column2, column3) VALUES ('$userName', '$email', '$contactNumber')";


            if ($connection->query($sql) === TRUE) {
                echo "<script>";
                echo "alert('New record created successfully');";
                echo "</script>";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                // echo "<script>";
                // echo "alert('New record created successfully');";
                // echo "</script>";
            }

        } else {
            // There are validation errors, handle them appropriately
            // Convert errors array to a JSON object to be used in JavaScript
            $errorsJson = json_encode($errors);

            echo "<script>";
            echo "var errors = $errorsJson;";
            echo "var errorMessage = 'Please fix the following errors:\\n';";
            echo "for (var field in errors) {";
            echo "    errorMessage += errors[field] + '\\n';";
            echo "}";
            echo "alert(errorMessage);";
            echo "</script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
            crossorigin="anonymous"
        >
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Lilita+One&family=Righteous&display=swap" 
            rel="stylesheet"
        >
        <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
        <title>Tharusha Peshala</title>
    </head>
    <body>
        <!-- Nav bar ------------------------------------------------------------------------------->
        <div class="nav-bar" id="home">
            <div class="nav-outer">
                <div class="nav-outer-name">
                    <h1 class="nav-name">Tharusha Peshala</h1>
                </div>
                <div class="nav-outer-ul-box">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About me</a></li>
                        <li><a href="#edu">Education</a></li>
                        <li><a href="#contact">Contact me</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="dummy-box"></div>


        <!-- Slider ------------------------------------------------------------------------------->
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./imgs/slider/a1.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider/1.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider/3.jpg" class="d-block" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        
        <!-- About --------------------------------------------------------------------------------->
        <div class="dummy-box" id="about"></div>
        <div class="container">
            <div class="about">
                <div class="about-outer">
                    <div class="about-left">
                        <img src="./imgs/about/my-img.jpg" alt="">
                    </div>
                    <div class="about-right">
                        <h1>About me</h1>
                        <h4>Undergraduate <span>at RUSL</span></h4>
                        <p>
                            I am an undergraduate at Rajarata University of Sri Lanka. I have ability to work in all the commonly used MS packages. 
                            And also, I have an ability to work with programming languages.
                            And, I can make the website more & more interactive with web animations.
                            I am interested in drawing. And, I like to play cricket in my leisure time. I am trying to learn graphic designing and video editing. 
                            Always, I like to beef up my knowledge and learn new things.
                            My ultimate career goal would be to reach a higher position in the IT field.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Education -------------------------------------------------------------------------------->
        <div class="dummy-box" id="edu"></div>
        <div class="container">
            <div class="edu">
                <div class="edu-outer">
                    <div class="edu-outer-top">
                        <h1>Education</h1>
                    </div>
                    <div class="edu-outer-bottem">
                        <div class="edu-box">
                            <h4>Primary Education</h4>
                            <img src="./imgs/education/ariyawansA.jpg" alt="primary">
                            <p>
                                I went to K/ Ariyawansha Maha Vidyalaya,Beruwala,
                                Kaluthara for my primary education. And, I passed 
                                the grade O/L scholarship examination.
                            </p>
                        </div>
                        <div class="edu-box edu-box-mid">
                            <h4>Secondary Education</h4>
                            <img src="./imgs/education/ds-senanayake.jpg" alt="secondary">
                            <p>
                                After the grade O/L-scholarship exam I went to D 
                                S Senanayaka National School. I did my A/Ls in  
                                Science stream. And, I passed the G.C.E.(A/L) examination 
                                and eligible for higher education.
                            </p>
                        </div>
                        <div class="edu-box">
                            <h4>Higher Education</h4>
                            <img src="./imgs/education/rusl.png" alt="higher">
                            <p>
                                Now, I am studying at Faculty of Applied Sciences 
                                (Physical Science) at Rajarata University of Sri Lanka.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contact me ----------------------------------------------------------------------------->
        <div class="dummy-box" id="contact"></div>
        <div class="container">
            <div class="contact-box">
                <h1>Contact me</h1>
                <div class="contact-outer">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <input type="text" name="userName" class="form-control" id="user-name" placeholder="User name">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="contactNumber" class="form-control" id="contact-number" placeholder="Contact number">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your messege"></textarea>
                        </div>
                        <div class="form-btn">
                            <input type="submit" name="submit" class="btn btn-primary" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <!-- Footer -------------------------------------------------------------------------------->
        <footer>
            <div class="container">  
                <p>Tharusha Peshala</p>
                <div class="social">
                    <a href="https://www.facebook.com/tharusha.peshala.9/"><i class="icono-facebook"></i></a>
                    <a href="https://www.instagram.com/tharushapeshala/"><i class="icono-instagram"></i></a>
                    <a href="https://www.linkedin.com/"><i class="icono-linkedIn"></i></a>
                </div>
               <p class="email"><span><b>Email: </b></span>a tharushapeshala2020@gmail.com</p>
               <p class="last">CopyRight by Tharusha Peshala</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
            crossorigin="anonymous">
        </script>
    </body>
</html>
<?php
    mysqli_close($connection);
?>