<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ URL::asset('/css/alleventscss.css') }}">
	<script src="{{URL::asset('/js/alleventsjs.js')}}"></script>


</head>
<body>
	<aside>
		<!-- Filter -->
		<h3>Filter</h3>
		<div class="optionsDiv">
			Categorie
			<select id="selectField">
				<option value="All" selected>All</option>
				<option value="Keynote">Keynote</option>
				<option value="Workshop">Workshop</option>
				<option value="Andere">Andere</option>
			</select>
		</div>
	</aside>
	<section>
		<section id="keynote">
			<h3>Keynote</h3>
			<table id="myTable">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Datum</th>
						<th>Lokaal</th>
						<th>Categorie</th>
					</tr>
				</thead>
				<tbody>
					<tr categorie="Keynote">
						<td>DeepDive Java</td>
						<td>10-12-2018</td>
						<td>A201</td>
						<td>Keynote</td>
					</tr>
					<tr categorie="Keynote">
						<td>DeepDive Angular</td>
						<td>12-02-2019</td>
						<td>A5</td>
						<td>Keynote</td>
					</tr>
					<tr>
						<td>DeepDive S4/HANA</td>
						<td>13-02-2019</td>
						<td>A3</td>
						<td>Keynote</td>
					</tr>
					<tr>
						<td>DeepDive Java</td>
						<td>10-12-2018</td>
						<td>A201</td>
						<td>Workshop</td>
					</tr>
					<tr>
						<td>DeepDive Angular</td>
						<td>12-02-2019</td>
						<td>A5</td>
						<td>Keynote</td>
					</tr>
					<tr>
						<td>DeepDive S4/HANA</td>
						<td>13-02-2019</td>
						<td>A3</td>
						<td>Keynote</td>
					</tr>
				</tbody>
			</table>
		</section>
		</section>
	</section>
	<aside>
		<div></div>
		<div></div>
	</aside>
</body>
</html>