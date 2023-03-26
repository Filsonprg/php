<!DOCTYPE html>
<html>
<head>
	<title>Entities Table</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		th, td {
		  padding: 5px;
		  text-align: left;
		}
	</style>
</head>
<body>
	<h1>Entities Table</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Count</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require_once('db.php');
				
				$db = new MySQL();
				$db->connect('localhost', 'root', '', 'test');
				$rows = $db->select('SELECT * FROM entities');
				
				foreach ($rows as $row) {
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>{$