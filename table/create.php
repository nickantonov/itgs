<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $tubeError = null;
        $nameError = null;
        $catError = null;
        $typeError = null;
        $imageError = null;
        $opError = null;
        $colError = null;
        $opysError = null;
        $infoError = null;
        $magError = null;



         
        // keep track post values
        $tube = $_POST['tube'];
        $name = $_POST['name'];
        $cat = $_POST['cat'];
        $type = $_POST['type'];
        $image = $_POST['image'];
        $op = $_POST['op'];
        $col = $_POST['col'];
        $opys = $_POST['opys'];
        $info = $_POST['info'];
        $mag = $_POST['mag'];

        // validate input
        $valid = true;

        if (empty($tube)) {
            $tubeError = 'Введите № касетницы';
            $valid = false;
        }
         
        if (empty($name)) {
            $nameError = 'Ведите название';
            $valid = false;
        
        }
         
        if (empty($cat)) {
            $catError = 'Введите категорию';
            $valid = false;
        }

        if (empty($type)) {
            $typeError = 'Введите тип';
            $valid = false;
        }

        if (empty($image)) {
            $imageError = 'Выберите картинку';
            $valid = false;
        }

        if (empty($op)) {
            $opError = 'Выберите PDF';
            $valid = false;
        }

        if (empty($col)) {
            $colError = 'Введите количество';
            $valid = false;
        }

        if (empty($opys)) {
            $opysError = 'Введите описание';
            $valid = false;
        }
         

         if (empty($info)) {
            $infoError = 'Введите доп инфо';
            $valid = false;
        }
         
          if (empty($mag)) {
            $magError = 'Введите адрес магазина';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (tube,name,cat,type,image,op,col,opys,info,mag) values(?, ?, ?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tube,$name,$cat,$type,$image,$op,$col,$opys,$info,$mag));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Создание списка</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($tubeError)?'error':'';?>">
                        <label class="control-label">№ Касетницы</label>
                        <div class="controls">
                            <input tube="tube" type="text"  placeholder="№ Касетницы" value="<?php echo !empty($tube)?$tube:'';?>">
                            <?php if (!empty($tubeError)): ?>
                                <span class="help-inline"><?php echo $tubeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Название</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Название" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($catError)?'error':'';?>">
                        <label class="control-label">Категория</label>
                        <div class="controls">
                            <input name="cat" type="text"  placeholder="Категория" value="<?php echo !empty($cat)?$cat:'';?>">
                            <?php if (!empty($catError)): ?>
                                <span class="help-inline"><?php echo $catError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                     <div class="control-group <?php echo !empty($typeError)?'error':'';?>">
                        <label class="control-label">Тип</label>
                        <div class="controls">
                            <input name="type" type="text"  placeholder="Тип" value="<?php echo !empty($type)?$type:'';?>">
                            <?php if (!empty($typeError)): ?>
                                <span class="help-inline"><?php echo $typeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                       <div class="control-group <?php echo !empty($imageError)?'error':'';?>">
                        <label class="control-label">Картинка</label>
                        <div class="controls">
                            <input name="image" type="text"  placeholder="Картинка" value="<?php echo !empty($image)?$image:'';?>">&nbsp; &nbsp;<input type="button" value="Выбрать файл">
                            <?php if (!empty($imageError)): ?>
                                <span class="help-inline"><?php echo $imageError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($opError)?'error':'';?>">
                        <label class="control-label">PDF файл</label>
                        <div class="controls">
                            <input name="op" type="text"  placeholder="PDF файл" value="<?php echo !empty($op)?$op:'';?>">&nbsp; &nbsp;<input type="button" value="Выбрать файл">
                            <?php if (!empty($opError)): ?>
                                <span class="help-inline"><?php echo $opError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
  
                      <div class="control-group <?php echo !empty($colError)?'error':'';?>">
                        <label class="control-label">Количество</label>
                        <div class="controls">
                            <input name="col" type="text"  placeholder="Количество" value="<?php echo !empty($col)?$col:'';?>">
                            <?php if (!empty($colError)): ?>
                                <span class="help-inline"><?php echo $colError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($opysError)?'error':'';?>">
                        <label class="control-label">Описание</label>
                        <div class="controls">
                            <input name="opys" type="text"  placeholder="Описание" value="<?php echo !empty($opys)?$opys:'';?>">
                            <?php if (!empty($opysError)): ?>
                                <span class="help-inline"><?php echo $opysError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($infoError)?'error':'';?>">
                        <label class="control-label">Информация</label>
                        <div class="controls">
                            <input name="info" type="text"  placeholder="Информация" value="<?php echo !empty($info)?$info:'';?>">
                            <?php if (!empty($infoError)): ?>
                                <span class="help-inline"><?php echo $infoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($magError)?'error':'';?>">
                        <label class="control-label">Адреса магазинов</label>
                        <div class="controls">
                            <input name="mag" type="text"  placeholder="Адреса магазинов" value="<?php echo !empty($mag)?$mag:'';?>">
                            <?php if (!empty($magError)): ?>
                                <span class="help-inline"><?php echo $magError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Создать</button>
                          <a class="btn" href="../system/sklad.php">Назад</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
