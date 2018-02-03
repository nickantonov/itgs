<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../table/bootstrap.min.css" rel="stylesheet">
    <script src="../table/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <!--h3>PHP CRUD Grid</h3-->
            </div>
            <div class="row">
              <p>
                    <a href="../table/create.php" class="btn btn-success">Создать</a>
                </p>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>№ Касетницы </th>
                      <th>Название</th>
                      <th>Категория</th>
                      <th>Тип</th>
                      <th>Картинка</th>
                      <th>PDF файл </th>
                      <th>Количество </th>
                      <th>Описание </th>
                      <th>Информация</th>
                      <th>Адреса магазинов</th>
                                <?php 
                                
                                ?>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../table/database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customers ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            
                            echo '<td>'. $row['tube'] . '</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['cat'] . '</td>';
                            echo '<td>'. $row['type'] . '</td>';
                            echo '<td>'. $row['image'] . '</td>';
                            echo '<td>'. $row['op'] . '</td>';
                            echo '<td>'. $row['col'] . '</td>';
                            echo '<td>'. $row['opys'] . '</td>';
                            echo '<td>'. $row['info'] . '</td>';
                            echo '<td>'. $row['mag'] . '</td>';
                            echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>'; 
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                               
                                                                          }

                   Database::disconnect();
                  ?>
                  </tbody>
           </table>
        <br></br>
        <input type="search" value="Ищем тут"> &nbsp; &nbsp; &nbsp; <input type="submit" value="Искать">
        </div>
    </div> <!-- /container -->
  </body>
</html>
