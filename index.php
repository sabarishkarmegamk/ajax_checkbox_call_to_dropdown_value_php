<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Checkbox call ajax dropdown php</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
html, body {
background-color: #fff;
color: #636b6f;
font-family: 'Nunito', sans-serif;
font-weight: 200;
height: 100vh;
margin: 0;
}
.full-height {
height: 100vh;
}
.flex-center {
align-items: center;
display: flex;
justify-content: center;
}
.position-ref {
position: relative;
}
.top-right {
position: absolute;
right: 10px;
top: 18px;
}
.content {
text-align: center;
}
.title {
font-size: 84px;
}
.links > a {
color: #636b6f;
padding: 0 25px;
font-size: 13px;
font-weight: 600;
letter-spacing: .1rem;
text-decoration: none;
text-transform: uppercase;
}
.m-b-md {
margin-bottom: 30px;
}
</style>
</head>
<body>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h2 class="text-primary">checkbox call to dropdown ajax php</h2>
</div>
<div class="card-body">
<form>
<div class="form-group">
<?php
require_once "db.php";
$result = mysqli_query($conn,"SELECT * FROM categories where parent_id = 0");
while($row = mysqli_fetch_array($result)) {
?>
<input type="checkbox" id="category-dropdown" value="<?php echo $row['0'];?>">
<?php
}
?>general
</div>
<div class="form-group">
<?php
require_once "db.php";
$result = mysqli_query($conn,"SELECT * FROM categories where parent_id = 4");
while($row = mysqli_fetch_array($result)) {
?>
<input type="checkbox" id="category" value="<?php echo $row['2'];?>">
<?php
}
?>php
</div>
<div class="form-group">
<?php
require_once "db.php";
$result = mysqli_query($conn,"SELECT * FROM categories where parent_id = 5");
while($row = mysqli_fetch_array($result)) {
?>
<input type="checkbox" id="cate" value="<?php echo $row['3'];?>">
<?php
}
?>html
</div>
<div class="form-group">
<select class="form-control" id="sub-category-dropdown">
</select>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
$('#category-dropdown').on('change', function() {
var category_id = this.value;
$.ajax({
url: "fetch-subcategory-by-category.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#sub-category-dropdown").html(result);
}
});
});
});
</script>
<script>
$(document).ready(function() {
$('#category').on('change', function() {
var category_id = this.value;
$.ajax({
url: "fetch-subcategory.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#sub-category-dropdown").html(result);
}
});
});
});
</script>
<script>
$(document).ready(function() {
$('#cate').on('change', function() {
var category_id = this.value;
$.ajax({
url: "fetch.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#sub-category-dropdown").html(result);
}
});
});
});
</script>

</body>
</html>