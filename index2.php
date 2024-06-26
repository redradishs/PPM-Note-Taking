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
        header("Location: index.php");
        exit();
    }
}

$sql = "SELECT COUNT(*) AS num_posts FROM messages";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$num_posts = $row['num_posts']; 

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="default.css">
    <link rel="stylesheet" href="ibaba.css">
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
    <section class="container navbar">
        <h4>PPM | Project</h4>
        <div class="buttons">
            <button type="button" class="button" data-toggle="modal" data-target="#write">ADD</button>
            <button><a href="#about">ABOUT</a></button>
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

<section class="message">
     <p>Parinig Section (<?php echo $num_posts; ?>)</p>
    <div class="row d-flex justify-content-center m-4" id="message-container">
    </div>
</section>


<img src="wave.png" alt="wave" class="img-fluid">
<section id="about" class="ibaba">
            <div class="logos">
            <i class="fa-brands fa-html5"></i>
            <i class="fa-brands fa-css3-alt"></i>
            <i class="fa-brands fa-js"></i>
            <i class="fa-brands fa-bootstrap"></i>
            <i class="fa-brands fa-php"></i>
            </div>
  <p>All rights 2024 ICTe Solutions</p>
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

<script>
  $(document).ready(function () {
    function fetchMessages() {
        $.ajax({
            url: 'get_message.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                displayMessages(response);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching messages:', error);
            }
        });
    }

    function displayMessages(messages) {
      $('#message-container').empty();
var currentTime = new Date(); // Get the current time
var currentTimeAdjusted = new Date(currentTime.getTime() - (12 * 60 * 60 * 1000)); // Adjust current time by subtracting 11 hours
messages.forEach(function (message) {
    var messageTime = new Date(message.timestamp); // Get the message's timestamp
    var timeDifferenceInMinutes = Math.floor((currentTimeAdjusted - messageTime) / (1000 * 60)); // Calculate the time difference in minutes
    var timeDifferenceInHours = Math.floor(timeDifferenceInMinutes / 60); // Calculate the time difference in hours
    var timeDifferenceInDays = Math.floor(timeDifferenceInHours / 24); // Calculate the time difference in days
    var remainingMinutes = timeDifferenceInMinutes % 60; // Calculate the remaining minutes after subtracting hours
    var remainingHours = timeDifferenceInHours % 24; // Calculate the remaining hours after subtracting days
    var daysAgo = timeDifferenceInDays === 1 ? '1 day' : timeDifferenceInDays + ' days'; // Format days ago message
    var hoursAgo = remainingHours === 1 ? '1 hour' : remainingHours + ' hours'; // Format hours ago message
    var minutesAgo = remainingMinutes === 1 ? '1 minute' : (remainingMinutes === 0 ? 'just now' : (remainingMinutes < 10 ? 'few minutes ago' : remainingMinutes + ' minutes')); // Format minutes ago message
    var timeAgo = timeDifferenceInDays > 0 ? daysAgo : (timeDifferenceInHours > 0 ? hoursAgo : minutesAgo); // Display days ago, hours ago, or minutes ago based on the time difference
    var messageHtml = '<div class="msgb col-sm-6 col-md-4 col-lg-3"> ' +
        '<div class="details">' +
        '<p>User: ' + message.username + '</p>' +
        '<p>' + timeAgo + '</p>' + // Display how long ago the message was posted
        '</div>' +
        '<p>' + message.content + '</p>' +
        '</div>';
    $('#message-container').append(messageHtml);
});
$('#num-posts').text(messages.length);
}

    fetchMessages();

    setInterval(fetchMessages, 5000);
});
</script>


</body>
</html>