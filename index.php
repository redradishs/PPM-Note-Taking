<?php
include("connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if the token matches the one stored in the session
    if(isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
        // Process form submission
        $username = $_POST['username'];
        $content = $_POST['content'];

        $query = "INSERT INTO messages (username, content) VALUES (:username, :content)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":content", $content);
        $stmt->execute();

        // Generate a new token to prevent duplicate submissions
        $_SESSION['token'] = bin2hex(random_bytes(32));

        // Redirect to the same page to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

// Generate a token and store it in the session
$_SESSION['token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPM | HomePage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bebas Nue Font -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Anton Static -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Chakra Font -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- for icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <section class="container navbar">
        <h4>PPM | Project</h4>
        <div class="buttons">
            <button type="button" class="button" data-toggle="modal" data-target="#write">ADD</button>
            <button>ABOUT</button>
        </div>
    </section>
    
    <section class="container tagline">
        <div class="row">
            <div class="textline col-6 col-lg-6">
                <p class="parinig">PARINIG</p>
                <p class="pamore">PA MORE!</p>
                <p class="feel">YOU FEEL</p>
                <h1 class="autoinput"><span class="auto-input"></span></h1>
            </div>
            <div class="imgline col-6 col-lg-6">
                <img src="box2.png" alt="parinig" class="parinig">
                <button type="button" class="writeb" data-toggle="modal" data-target="#write">WRITE</button>
            </div>
        </div>
    </section>
    <section class="container autoinput">
    </section>

<div class="modal fade" id="write" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" name="username" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <input type="text" name="content" class="form-control" id="message-text">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Post</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <section class="container message">
        <p>Parinig Section (5)</p>

        <div class="row">
        <?php  
$sql = "SELECT username, content, timestamp FROM messages";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0) {
    foreach ($result as $row) {
        // Format the timestamp
        $formatted_timestamp = date("d/m/Y H:i", strtotime($row["timestamp"]));
        ?>
        <div class="msgb col-sm-6 col-md-4 col-lg-3"> 
            <div class="details">
                <p>User: <?php echo $row["username"]; ?></p>
                <p><?php echo $formatted_timestamp;?></p> 
            </div>
            <p><?php echo $row["content"]; ?></p>
        </div>
        <?php
    }
} else {
    echo "<p>No messages found</p>";
}
?>



    </div>

    </section>
    <!-- <section class="container">
        <div class="pages">
            <p class="page">1</p>
            <p class="page">2</p>
            <p class="page">3</p>
            <p class="page">4</p>
        </div>
    </section> -->

    <section class="container disclaimer">
                    <p class="how">How does this work?</p>
                    <h5>The system collects data from the user, containing the username and the message they want to send.</h5>
                    <h5>Once posted the users will be able to post it online, if the content of the post aligns with terms we consider maliscious it will be deleted.</h5>
                    <h5>The posted contents will also be deleted after a week to minimize the storage consumption</h5>
                    <p class="how">LANGUAGES USED</p>
                    <div class="row icons">
                        <div class="col-sm-6 col-md-4 col-lg-3 iconsplus">
                            <i class="fa-brands fa-html5" style="font-size: 100px;"></i>
                            <p>HTML</p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 iconsplus">
                            <i class="fa-brands fa-css3-alt" style="font-size: 100px;"></i>
                            <p>CSS</p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 iconsplus">
                            <i class="fa-brands fa-js" style="font-size: 100px;"></i>
                            <p>JAVASCRIPT</p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 iconsplus">
                            <i class="fa-brands fa-bootstrap" style="font-size: 100px;"></i>
                            <p>BOOTSTRAP</p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 iconsplus">
                            <i class="fa-brands fa-php" style="font-size: 100px;"></i>
                            <p>PHP</p>
                        </div>
                    </div>
            <h5>We do not encourage people to use this website for hateful comments but if you do, the developer is not responsible for any content that will be posted here.</h5>
    </section>
    <section class="about">
    <p class="abouttext">Gusto mo bang marinig ang mga kwento</p>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".auto-input", {
            strings: ["HAPPY?", "SAD?", "LOVED?","WRONGED?", "JUDGED?", "HURT?"],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true
        })
    </script>
</body>
</html>
<!-- 
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $username = $_POST['username'];
//     $content = $_POST['content'];

//     $query = "INSERT INTO messages (username, content) VALUES (:username, :content)";
//     $stmt = $conn->prepare($query);
//     $stmt->bindParam(":username", $username);
//     $stmt->bindParam(":content", $content);
//     $stmt->execute();
// }

?> -->