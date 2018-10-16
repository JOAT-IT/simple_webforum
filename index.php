<?php include ("common.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>ひよこ掲示板</title>
		<meta charset = "utf-8">
		<style>
			p {padding: 5px, margin-left: 50px;}
			div.content {boarder-top: 1px dashed #555; margin-top: 10px;}
		</style>
	</head>
	<body>
		<h1></h1>
		<form action = "write.php" method = "post">
			名前<br>
			<input type = "text" name = "name" value = "" size = "24"><br>
			コメント<br>
			<textarea name = "comment" cols = "40" rows = "3"></textarea><br>
			<input type = "submit" name = "submit" value = "書き込み"><br>
		</form>
<?php
		$records = bbs_read();
		foreach ($records as $key => $record) {
		?><div class = "content">
			<span class = "id"><?php print h($key + 1); ?></span>
			<span class = "name"> 名前: <?php print h($record["name"]); ?></span>
			<span class = "time"><?php
				print date ("Y年m月d日H時i分s秒", intval($record["time"]));
			?></span>
			<p class = "comment"><?php print nl2br(h($record["comment"])); ?></p>
		</div>
		<?php } ?>
	</body>
</html>