<!DOCTYPE html>
<html>
<head>
    <title>UPDATE MOVIE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="add" id="add">
  <form action="update.php" method="post" class="b">
        <p class="start">Update movie data: </p>
        <label>Title:</label>
        <input type="text" name="update_title" placeholder="Enter title:"><br>

        <label>Description: </label>
        <input type="text" name="update_description" placeholder="Enter description:"><br>

        <label>Image URL: </label>
        <input type="text" name="update_image" placeholder="Enter image URL:"><br>

        <label>Year: </label>
        <input type="text" name="update_year" placeholder="Enter year:"><br>

        <label>Production: </label>
        <input type="text" name="update_production" placeholder="Enter production:"><br> 

        <label>Runtime: </label>
        <input type="text" name="update_runtime" placeholder="Enter runtime:"><br> 

        <label>Directors: </label>
        <input type="text" name="update_directors" placeholder="Enter directors:"><br> 

        <label>Scenarist: </label>
        <input type="text" name="update_scenarist" placeholder="Enter scenarist:"><br> 

        <label>Stars: </label>
        <input type="text" name="update_stars" placeholder="Enter stars:"><br> 

        <label>Genres: </label>
        <input type="text" name="update_genres" placeholder="Enter genres:"><br> 

        <button type="submit">Update movie</button>
    </form>
</div>

</body>
</html>


