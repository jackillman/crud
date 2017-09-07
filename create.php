<?php
     
    require 'database.php';
  
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $lastNameError = null;
        $birthdateError = null;
        $descriptionError = null;
        $marital_statusError = null;
        $languageError = null;
        $quantityError = null;
        
        // keep track post values
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $birthdate = $_POST['birthdate'];
        $description= $_POST['description'];
        $marital_status = $_POST['marital_status'];
        $language= $_POST['language'];
        $quantity= $_POST['quantity'];
       
     
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
       
         
        if (empty($lastName)) {
            $lastNameError = 'Please enter lastname';
            $valid = false;
        }
        if (empty($birthdate)) {
            $birthdateError = 'Please enter birthdate';
            $valid = false;
        }
        if (empty($description)) {
            $descriptionError = 'Please enter desc';
            $valid = false;
        }
        if (empty($marital_status)) {
            $marital_statusError = 'Please enter marital';
            $valid = false;
        }
        if (empty($language)) {
            $languageError = 'Please enter language';
            $valid = false;
        }
        if (empty($quantity)) {
            $quantityError = 'Please enter quantity';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,lastName,birthdate,description,marital_status,language,quantity) values(?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$lastName,$birthdate,$description,$marital_status,$language,$quantity));
           
            Database::disconnect();
            header("Location: index.php");
        }
    }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <link   href="libs/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
            
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($lastNameError)?'error':'';?>">
                        <label class="control-label">lastname</label>
                        <div class="controls">
                            <input name="lastName" type="text"  placeholder="lastName" value="<?php echo !empty($lastName)?$lastName:'';?>">
                            <?php if (!empty(lastNameError)): ?>
                                <span class="help-inline"><?php echo $lastNameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($birthdateError)?'error':'';?>">
                        <label class="control-label">birthdate</label>
                        <div class="controls">
                            <input name="birthdate" type="text"  placeholder="birthdate" value="<?php echo !empty($birthdate)?$birthdate:'';?>">
                            <?php if (!empty($birthdateError)): ?>
                                <span class="help-inline"><?php echo $birthdateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">descr</label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="descr" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($marital_statusError)?'error':'';?>">
                        <label class="control-label">marital_status</label>
                        <div class="controls">
                            <input type="radio" name="marital_status" value="Да">Да
                            <input type="radio" name="marital_status" value="Нет">Нет
                            <?php if (!empty($marital_statusError)): ?>
                                <span class="help-inline"><?php echo $marital_statusError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($languageError)?'error':'';?>">
                        <label class="control-label">language</label>
                        <div class="controls">
                            <select name="language">
                                <option value="ru">Русский</option>
                                <option value="ua">Украинский</option>
                                <option value="us">Английский</option>
                              </select>
                            <?php if (!empty($languageError)): ?>
                                <span class="help-inline"><?php echo $languageError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      
                       <div class="control-group">
                        <label class="control-label">quantity</label>
                        <div class="controls">
                            <p><input type="checkbox" name="quantity" value="1"> Раз</p> 
                            <p><input type="checkbox" name="quantity" value="2"> Два</p> 
                            <p><input type="checkbox" name="quantity" value="3"> Три</p> 
                            
                        </div>
                      </div>
                      
   
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>