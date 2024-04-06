<?php
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['feedback'])){
    $feedback = $_POST['feedback'];
    
    $query = "INSERT INTO feedbacks (feedback) VALUES (:feedback)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":feedback", $feedback);
    $stmt->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}
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
    <link rel="stylesheet" href="maintenance.css">
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
    <section class="container maintenance">
        <h4>PPM | Project</h4>
    </section>
    <section class="container tagline">
        <div class="row">
            <div class="textlined col-12 col-lg-6">
                <p class="parinig">PARINIG</p>
                <p class="pamore">PA MORE!</p>
                <p class="feel">SYSTEM UNDER</p>
                <h1 class="autoinput"><span class="auto-input"></span></h1>
            </div>
            <div class="imgline col-12 col-lg-6">
                <i class="fa-solid fa-hammer"></i>
                <button type="button" class="writeb" data-toggle="modal" data-target="#write">Write a Feedback</button>
            </div>
        </div>
    </section>
    <section class="container autoinput">
    </section>


<div class="modal fade" id="write" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UNDER MAINTENANCE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" required>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <p>The developer values your feedback</p>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Feedback:</label>
            <input type="text" name="feedback" class="form-control" id="message-text">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Send</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".auto-input", {
            strings: ["MAINTENANCE", "UNDER"],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true
        })
    </script>
</body>
</html>