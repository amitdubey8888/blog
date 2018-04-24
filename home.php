<?php 
    include_once('config.php');
    $sql = mysqli_query($db, "SELECT * FROM blog ORDER BY updated_at DESC");
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="Website designed by Adapt Media Group & Appwallaz">
<meta name="keywords" content="Dentist-blog, van-buren-blog, my-dentist-blog, christopher-larson-blog">
<meta name="author" content="Adapt Media Group & Appwallaz">
<title>My Dentist Blog - Van Buren, Arkansas - Dentist Blog</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .wrapper{
        width:60%;
        margin:auto;
        margin-top:2%;
    }
    .image-header{
        width:100%;
    }
    .image-left{
        width:70%;
        float:left;
    }
    .image-right{
        width:30%;
        float:right;
    }
    .edit{
        width:88%;
        float:left;
        text-align:right;
        cursor:pointer;
    }
    .delete{
        width:10%;
        float:right;
        text-align:right;
        cursor:pointer;
    }
    .card {
        padding: 2%;
        margin-bottom:1%;
    }
    .fa-edit{
        color:blue;
    }
    .fa-trash{
        color:red;
    }
    .card-title {
        margin-bottom: .75rem;
        color: chocolate;
    }
    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }
    .text-muted {
        color: blue;
    } 
    .true-image{
        width:100%;
    }
    a {
    color: white;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><h4>Blog</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="blog.php"><h4>Add Blog</h4></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><a href="logout.php">Logout</a></button>
    </form>
  </div>
</nav>

<div class="wrapper">
    <?php while($row = mysqli_fetch_assoc($sql)){ ?>
    <div class="card">
        <div class="image-header">
            <div class="image-left"><img class="true-image" src="./images/<?=$row['image'];?>"></div>
            <div class="image-right">
                <div class="edit" onclick="edit_me(<?=$row['id'];?>)"><i class="fas fa-edit"></i></div>
                <div class="delete" onclick="delete_me(<?=$row['id'];?>)"><i class="fas fa-trash"></i></div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?=$row['title'];?></h5>
            <p class="card-text"><?=$row['description'];?></p>
            <p class="card-text"><small class="text-muted">Updated at <?=$row['updated_at'];?></small></p>
        </div>
    </div>
    <?php } ?>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    function edit_me(id){
        if(confirm('Are you sure ?')){
            console.log('ID ', id);
            window.location.href='edit_blog.php?id='+id;
        }
    }
    function delete_me(id){
        if(confirm('Are you sure ?')){
            $.ajax({
                type: 'POST',
                url: 'delete_blog.php',
                data:  'id='+id,
                success: function(res){
                    if(parseInt(res)==1){
                        alert("Blog deleted successfully !");
                    }
                    else{
                        alert('Sorry, Unable to delete !');
                    }
                },
                error: function(){
                    alert('Sorry, Unable to delete !');
                }
            });
        }
        location.reload(true);
    }
</script>
</body>
</html>
