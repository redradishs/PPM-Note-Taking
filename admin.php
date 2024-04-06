<?php
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        $id= $_POST["id"];

        $query = "DELETE FROM messages WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Post ID is Required";
    }
}
$sql = "SELECT COUNT(*) AS num_posts FROM messages";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$num_posts = $row['num_posts']; 
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

    <!-- admin css -->
    <link rel="stylesheet" href="admin.css">

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
            <button><a href="#about">ABOUT</a></button>
        </div>
    </section>

    <h5 class="admin container d-flex justify-content-center">ADMIN PAGE</h5>

    <section class="deletebox container d-flex justify-content-center">
        <div class="box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                <h3>Enter the id of the post</h3>
                <input type="text" name="id" placeholder="Enter the id">
                <button class="delete" type="submit">DELETE</button>
            </form>
        </div>
    </section>


    <section class="message">
        <p>Parinig Section <?php echo $num_posts?></p>

        <div class="row d-flex justify-content-center m-4">
        <?php  
        $sql = "SELECT id, username, content, timestamp FROM messages ORDER BY timestamp DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
          foreach ($result as $row) {
        // Format the timestamp
        $formatted_timestamp = date("d/m/Y H:i", strtotime($row["timestamp"]));
        ?>
        <div class="msgb col-sm-6 col-md-4 col-lg-3"> 
        <h6>ID: <?php echo $row["id"]; ?></h6>
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
</body>
</html>