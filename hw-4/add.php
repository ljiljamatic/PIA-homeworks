<!DOCTYPE html>
<html>
<head>
    <title>ADD MOVIE</title>
    <link rel="stylesheet" type="text/css" href="default.css">
</head>
<body>
<div class="add" id="add">
  <form action="add-check.php" method="post" class="b" enctype="multipart/form-data">
        <p class="start">Movie data: </p>
        <label>Title</label>
        <input type="text" name="title" placeholder="Enter title:"><br>
        <label>Description: </label>
        <input type="text" name="description" placeholder="Enter description:"><br>
        <label>Image: </label>
        <input type="file" name="image">
        <label>Year: </label>
        <input type="text" name="year" placeholder="Enter year:"><br>
        <label>Production: </label>
        <input type="text" name="production" placeholder="Enter production:"><br> 
        <label>Runtime: </label>
        <input type="text" name="runtime" placeholder="Enter runtime:"><br> 
        <label>Directors: </label>
        <input type="text" name="directors" placeholder="Enter directors:"><br> 
        <label>Scenarist: </label>
        <input type="text" name="scenarist" placeholder="Enter scenarist:"><br> 
        <label>Stars: </label>
        <input type="text" name="stars" placeholder="Enter stars:"><br> 
        <label>Genres: </label>
        <input type="text" name="genres" placeholder="Enter genres:"><br> 
        <button type="submit" name="add_movie">Add movie</button>
    </form>
</div>
</body>
</html>