<!DOCTYPE html>
<html>
<head>
    <title>Guessing Game</title>
    <style>
        /* Added a font family and font size for better readability */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-image: url('bgguess.png');
        }
        
        .container {
            background-color: #1d8eff52; /* Changed to a softer blue */
            border: 3px     black; /* Changed to a darker green */
            margin: 20px; /* Added some margin for better spacing */
            padding: 20px; /* Added some padding for better spacing */
            border-radius: 20px; /* Added a border radius for a smoother look */
        }
        
        .con {
            align-items: center;
            background-color: #F5F5DC; /* Changed to a lighter beige */
            margin: 50px; /* Reduced the margin for better spacing */
            padding: 20px; /* Reduced the padding for better spacing */
            border: 3px solid #32CD32; /* Changed to a darker green */
            border-radius: 10px; /* Added a border radius for a smoother look */
        }
        h2{
            border: 2px yellow ;
            width: 400px;
            margin-left: 374px;
            border-radius: 30px;
            background-color:#100e0ec4;
            text-align: center;
            font-size: 35px;
            color: #aa9334;
        }

        P{
            text-align: center;
            color: #aa9334;
            font-size: large;
            font-weight: bold;
            border: 2px  ;
            background-color: #100e0ec4;
            width: 487px;
            margin-left: 309px;
            border-radius: 30px;
        }
        input[type="submit"] {
        font-size: 18px; /* adjust the font size to your liking */
        border-radius: 20px;
        background-color: #fc303085;
        }
       .cont1{
        background-color: #000000db ;
        border: 2px green ;
        margin: 19px;
        padding: 25px;
        border-radius: 25px;
        height: 20px;
       }
       .cont1 p{
        color:white;
        font-size: 10px;
       
        
       }
      
    </style>
</head>
<body>
    <?php
    
    session_start(); // start the session to store the random number and tries
    
    if (!isset($_SESSION['randomNumber'])) {
        $_SESSION['randomNumber'] = rand(1, 100);
        $_SESSION['tries'] = 0;
    }
    
    if (isset($_POST['guess'])) {
        $guess = intval($_POST['guess']); // convert to integer
    
        if ($guess < 1 || $guess > 100) {
            $message = "Invalid input. Please enter a number between 1 and 100.";
        } else {
            $_SESSION['tries']++; // increment tries
    
            if ($guess == $_SESSION['randomNumber']) {
                $message = "Congratulations! You guessed the number correctly. The Number is " . $_SESSION['randomNumber'];
                unset($_SESSION['randomNumber']); // reset the game
                unset($_SESSION['tries']);
            } elseif ($guess < $_SESSION['randomNumber']) {
                $message = "<font color=red> Your guess is too low. Try again. </font>";
            } else {
                $message = "<font color=red>Your guess is too high. Try again. </font>";
            }
    
            if ($_SESSION['tries'] >= 5) { // check against maxtries
                $message = "<font color=#2cef10>Sorry, you ran out of tries. The number was: " . $_SESSION['randomNumber']."  </font>";
                unset($_SESSION['randomNumber']); // reset the game
                unset($_SESSION['tries']);
            }
        }
    
        echo "<p>$message</p>"; // Display the message
    }
    ?>
    <div class="container">
        <h2>Guessing Game</h2> <!-- Added a heading for better readability -->
        <p>Guess a number between 1 and 100.</p>
        
        <form method="post" action="" class="con">
            <label for="guess">Enter your guess:</label>
            <input type="number" name="guess" id="guess">
            <br><input type="submit" value="Guess">
        </form>
    </div>
    <br><br><br>    
    <footer>
    <div class="cont1">
        <p>by  ~AmarRaj Yekbote || contact: xxxxxxx117 || email : amarrajyekbote90@gmail.com</p>
    </div>
    </footer>
   
</body>
</html>