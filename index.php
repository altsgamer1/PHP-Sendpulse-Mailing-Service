<?php
if (isset($_POST['submit'])) {
	include 'classes/Model.php';
	include 'classes/Post.php';

	use Mailing\Post;

	$post = new Post();
	$post->title = $_POST['title'];
	$post->description = $_POST['description'];
	$post->youtube = $_POST['youtube'];
	$post->vc = $_POST['vc'];
	$post->not_returnable = ($_POST['not_returnable'] ? $_POST['not_returnable'] : 0);
	$post->save();
}
?>
<html>
	<head>
		<title>Добавление постов</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<form class="my-5" method="post" action="index.php?success">
				<h3 class="text-center">Добавление постов</h3>
				<div class="mb-3">
				  	<label class="form-label">Заголовок статьи</label>
				  	<input type="text" class="form-control" name="title" required>
				</div>
				<div class="mb-3">
				  	<label class="form-label">Описание</label>
				  	<textarea class="form-control" name="description" rows="5" required></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							  <label class="form-label">Ссылка на youtube.com</label>
							  <input type="text" class="form-control" name="youtube" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							  <label class="form-label">Ссылка на vc.ru</label>
							  <input type="text" class="form-control" name="vc" required>
						</div>
					</div>
				</div>
				<div class="mb-3 form-check">
				  	<input type="checkbox" class="form-check-input" id="not_returnable" name="not_returnable" value="1">
				  	<label class="form-check-label" for="not_returnable">Невозвратный</label>
				</div>
				<input type="submit" name="submit" value="1" class="btn btn-primary">
                <?php if(isset($_GET['success'])): ?>
                <p class="text-success mt-3">Пост добавлен успешно</p>
                <?php endif ?>
			</form>
		</div>
	</body>
</html>
