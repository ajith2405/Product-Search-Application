 <!DOCTYPE html>

<html lang="en">
<head>
    
    
    <title>Product Search</title>
   
  <style>
        table {
            margin: 0 auto;
            font-size: large;
        }
  
        h1 {
            text-align: center;
            color: #0000FF;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        td {
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
        header{
            color:black;
        }
        button{
            background:skyblue;
        }
    </style>
  
  
</head>
<body>
<div class="wrapper" ><center>
    <header>Ajith Wholesale Dealers<br><center>Searched Product List<center></header>
    </center>
  
  

  <table style="background-color: #b4dece7a;">
    
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>City</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>

 <?php
          $product = (isset($_POST['product_name']) ? $_POST['product_name']:'');
          $warehouse = (isset($_POST['warehouse_City']) ? $_POST['warehouse_City']:'');
          $minquantity = (isset($_POST['min_quantity']) ? $_POST['min_quantity']:'');
          $maxquantity = (isset($_POST['max_quantity']) ? $_POST['max_quantity']:'');
          $minimumprice = (isset($_POST['min_price']) ? $_POST['min_price']:'');
          $maximumprice = (isset($_POST['max_price']) ? $_POST['max_price']:'');
          
        
            $product = empty($product) ? "" : $product;
            $warehouse = empty($warehouse) ? "" : $warehouse;
            $minquantity = empty($minquantity) ? PHP_INT_MIN : $minquantity;
            $maxquantity = empty($maxquantity) ? PHP_INT_MAX : $maxquantity;
            $minimumprice = empty($minimumprice) ? PHP_INT_MIN : $minimumprice;
            $maximumprice = empty($maximumprice) ? PHP_INT_MAX : $maximumprice;

        
           
          $DB_Host = "localhost";
          $DB_user  = "id20564517_aasu";
          $password = "O{i&7u[G(tJUe(PY";
          $DB_name = "id20564517_ajithmywebsite";
          $conn =  new mysqli($DB_Host,$DB_user,$password,$DB_name);
              
        
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        
        $sql = "select * from products where (pname like '%$product%') and (city like '%$warehouse%') and (quantity between $minquantity and $maxquantity) and (price between $minimumprice and $maximumprice)";
            $result = mysqli_query($conn,$sql);
        if($result){
            if ($result->num_rows > 0) {
                while($rows=$result->fetch_assoc()) {
     ?>
    <tr>
        <td><?php echo $rows['pid'];?></td>
        <td><?php echo $rows['pname'];?></td>
        <td><?php echo $rows['city'];?></td>
        <td><?php echo $rows['quantity'];?></td>
        <td><?php echo $rows['price'];?></td>
    </tr>
    <?php
                }
            } 
        }
        else{
          echo "database error";
        }
        $conn->close();
     ?>
</table>

    <br>
    <br>
    <center>
      <div class="dbl-field">
      <div class="button-area">
         <button onclick="ch_back()">Perform Another search</button>
        <span></span>
      </div>
      </div>
      </center>
      
          <br>
    <br>
    <script>
        function ch_back(){
            window.history.back();
        }
    </script>
</div>
</body>
</html>