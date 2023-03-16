<!DOCTYPE html>

<html>
<meta charset="UTF-8">
	<title>Reviews</title>
</head>
<body>

<form action="reviews_get.php" method="get">
    <h1> Filter Reviews</h1>

    <h3>Order By Rating</h3>
    <select name="OrderByRating" id="OrderByRating">
        <option value="HighestFirst"> Highest First </option>
        <option value="LowestFirst"> Lowest First</option>
    </select>
    <br>

    <h3> Minimum Rating</h3>
    <select name="minRating" id="minRating">
        <option value="5th">5</option>
        <option value="4th">4</option>
        <option value="3rd">3</option>
        <option value="2nd">2</option>
        <option value="1st">1</option>
</select>
<br>

<h3>Order By Date: </h3>
<select name="ByDate" id="ByDate">
    <option value="NewestFirst">Newest First</option>
    <option value="OldestFirst">Oldest First</option>
</select>
<br>

<h3>Prioritize by Text:</h3>
<select name="Priority" id="Priority">
    <option value="yes">Yes</option>
    <option value="no">No</option>
</select>
<br>

<input type="submit" value="Filter">

</form>


</body>
</html>
