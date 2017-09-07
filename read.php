<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customers where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <link   href="libs/bootstrap.min.css" rel="stylesheet">
     <style>
    .checkbox{
        font-size: 1.5em;
        color: #333;
         }
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Customer</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">lastname</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['lastName'];?>
                            </label>
                        </div>
                      </div>
                       
                       <div class="control-group">
                        <label class="control-label">birthdate</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['birthdate'];?>
                            </label>
                        </div>
                      </div>
                       
                       <div class="control-group">
                        <label class="control-label">desc</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['description'];?>
                            </label>
                        </div>
                      </div>
                       
                       <div class="control-group">
                        <label class="control-label">martial_status</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['marital_status'];?>
                            </label>
                        </div>
                      </div>
                       
                       <div class="control-group">
                        <label class="control-label">language</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['language'];?>
                            </label>
                        </div>
                      </div>
                       
                        <div class="control-group">
                        <label class="control-label">quantity</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['quantity'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>