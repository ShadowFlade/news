<?php

class NewsModel
{
	const IP = '172.21.0.4';
	const IP2= '172.21.0.4:3306';
	static function getCount()
	{
		$connection =  new mysqli(self::IP2, 'root', 'example','news' );
		$sql = 'SELECT COUNT(*) FROM news';
		$result = mysqli_query($connection, $sql);
		$arr = mysqli_fetch_array($result);
		return (int) $arr[0];
	}

	static function getRows($offset, $limit)
	{
		$connection = new mysqli(self::IP2, 'root', 'example','news');
		mysqli_set_charset($connection, 'utf8');
		$sql = "SELECT * FROM news LIMIT $offset, $limit";

		$result = [];
		$rows = mysqli_query($connection, $sql);

		while ($row = mysqli_fetch_array($rows)) {

			$article = [
				'id' => $row['id'],
				'date' => gmdate('d.m.Y', $row['idate']),
				'title' => $row['title'],
				'announce' => $row['announce'],
				'content' => $row['content'],
			];

			if ($article !== null) {
				$result[] = $article;
			}
		}

		return $result;
	}

	static function getItem($id)
	{
		$connection = new mysqli(self::IP2, 'root', 'example', 'news');
		mysqli_set_charset($connection, 'utf8');
		$sql = "SELECT * FROM news WHERE id = $id";
		$row = mysqli_query($connection, $sql);
		return mysqli_fetch_assoc($row);
	}
}
