<?php include "connect-db.php";  ?>




	<!DOCTYPE html>
		<html>
			<head>
				<title>View Records</title>
			</head>

			<body>
				<form name="get-records" action="" method="get">
					<select name="category">
						<option value="reading">reading</option>
						<option value="to_do">to do</option>
					</select>
					<input type="submit" name="submit" value="submit">
				</form>

	<?php

			if (isset($_GET["category"])) {
				$category = $_GET["category"];
				$sql = "SELECT * FROM " . $category . " ORDER BY id";
				$result = $mysqli->query($sql);

				if ($result) {
					if ($result->num_rows > 0 ) {
						echo "<table>";
						echo "<tr><th>ID</th><th>Date</th><th>Note</th></tr>";
						while ($row = $result->fetch_object()) {
							echo "<tr><td>" . $row->id . "</td><td>" . $row->date . "</td><td>" . $row->note . "</td></tr>";
						}
						echo "</table>";

					} else {
						echo "No results to display";
					}

				} else {
					echo "Error: " . $mysqli->error;
				}

				$mysqli->close();
			}	?>


			</body>
		</html>


		<!-- I ran into a nasty problem a moment ago - got the error that $mysqli was an undeclared, that I was trying to call ->query() on a null variable...
			The problem was, I had forgotten scope.  In php, each scope is totally isolated from each other scope.  And I was rendering the page inside 
			a function, but had declared the $mysqli variable in the include "connnect-db.php"; statement in line 1, OUTSIDE the function.  That was my whole trouble.
			so I axed the function entirely, did it all outside the function.  and it worked. perfectly.