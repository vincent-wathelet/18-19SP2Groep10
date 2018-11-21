<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/myeventsentriescss.css') }}">
</head>
<body>
	<section>
		<h3>DeepDive S4/HANA Entries</h3>
		<p>Aantal  inschrijvingen : 4</p>
		<span style="width: 150px;display:inline-block"></span>
		<p>Deelnemers nog mogelijk: 0</p>

		<table>
			<tr>
				<th>Naam</th>
				<th>Acount Status</th>
				<th>Accepted</th>
				<th>Geweigerd</th>
			</tr>
			<tr>
				<td>Joske Vermeulen</td>
				<td><img src="{{ URL::asset('icons/img01.png') }}" height="24" width="24"/></td>
				<td><input type="checkbox" checked="true"/></td>
				<td><input type="checkbox"/></td>
			</tr>
			<tr>
				<td>Imke Kempe</td>
				<td><img src="{{ URL::asset('icons/img02.png') }}" height="24" width="24"/></td>
				<td><input type="checkbox"/></td>
				<td><input type="checkbox" checked="true"/></td>
			</tr>
			<tr>
				<td>Jonas Lieder</td>
				<td><img src="{{ URL::asset('icons/img01.png') }}" height="24" width="24"/></td>
				<td><input type="checkbox" checked="true"/></td>
				<td><input type="checkbox"/></td>
			</tr>
			<tr>
				<td>Katie Ludovic</td>
				<td><img src="{{ URL::asset('icons/img01.png') }}" height="24" width="24"/></td>
				<td><input type="checkbox"/></td>
				<td><input type="checkbox"/></td>
			</tr>
		</table>
	</section>
</body>
</html>