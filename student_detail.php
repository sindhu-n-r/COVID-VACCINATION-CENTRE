<?php
include 'connect_test_db.php';
$searchErr = '';
$student_info='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from vaccinationcenter where locality like '%$search%'");
        $stmt->execute();
        $student_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($student_info);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
    <title>STUDENT DETAILS</title>
    <link rel="stylesheet" href="home.css">  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=El+Messiri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<style>
    table,th,td {
      background-color: black;
      border : 2px solid rgb(49, 214, 255);
      border-collapse: collapse;
      color:aliceblue;
      margin-left:320px;
      margin-top:-60px;
    }
    th{
      color:rgb(213, 59, 252);
      font-family: 'El Messiri', sans-serif;
    }
    form{
      margin:50px;
      margin-top:140px;
    }
    .box{
      width:200px;
      height:50px;
    }
    th,td {
      padding: 5px;
    }
    .container{
      width:70%;
      height:100%;
      padding:20px;
    }
    .form-control{
      height:
    }
    .col-sm-4{
      margin-left:400px;
      margin-top:-20px;
      width:500px;
    }
    .col-sm-2{
      margin-left:910px;
      margin-top:-40px;
    }
  </style>
  </head>
<body>
<button onclick="history.back()">Go Back</button>
  <header>
    <div class="wrapper">
      <div class="logo">
        <img src="logo.png" alt=""><h1 id="letter">&nbsp STUDENT DETAILS</h1>
      </div>
      <ul class="nav-area">
        <li><a href="web.html">Logout</a></li>
      </ul>
    </div>
    <div class="container">
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4">
              <input style="width:500px; height:40px; border-radius:5px;" type="text" class="form-control" name="search" placeholder="search here">
            </div>
            <div class="col-sm-2">
              <button style="width:40px; height:40px; border-radius:5px;" type="submit" name="save" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="form-group">
            <span class="error"> <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <center>
    <div class="table-responsive">          
      <table class="table">
        <tbody>
                <?php
                 if(!$student_info)
                 {
                   ?>
                    <p style='color:white; margin-left:300px; margin-top:-40px'> Data not found </p>
                    <?php
                 }
                 else{
                    foreach($student_info as $key=>$value)
                    {
                        ?>
                    
                        <tr>
                          <th>name</th>
                          <td><?php echo $value['name'];?></td><br>
                        </tr>
                        <tr>
                        <th>fathername</th>
                          <td><?php echo $value['fathername'];?></td>
                        </tr>
                        <tr>
                          <th>mothernmae</th>
                          <td><?php echo $value['mothername'];?></td>
                        </tr>
                        <tr>
                          <th>rollno</th>
                          <td><?php echo $value['rollno'];?></td>
                        </tr>
                        <tr>
                          <th>department</th>
                          <td><?php echo $value['department'];?></td>
                        </tr>
                        <tr>
                          <th>yearofstudying</th>
                          <td><?php echo $value['yearofstudying'];?></td>
                        </tr>
                        <tr>
                          <th>DOB</th>
                          <td><?php echo $value['DOB'];?></td>
                        </tr>
                        <tr>
                          <th>gender</th>
                          <td><?php echo $value['gender'];?></td>
                        </tr>
                        <tr>
                          <th>address</th>
                          <td><?php echo $value['address'];?></td>
                        </tr>
                        <tr>
                          <th>email</th>
                          <td><?php echo $value['email'];?></td>
                        </tr>
                        <tr>
                          <th>mobilenumber</th>
                          <td><?php echo $value['mobilenumber'];?></td>
                        </tr>
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>
</div>
                </center>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</header>
</body>
</html>