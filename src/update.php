<?php

include 'functions.php';

$connection = connection('mysql', 'CRUD_db', 'user', '123');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    update($connection, $_GET['id'], $_POST['title'], $_POST['content']);
    $msg = "Post successfully updated!";
}

$post = read($connection, $_GET['id']);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-w-4xl mx-auto space-y-10 py-10">
<h1 class="text-3xl font-bold underline">Update</h1>
<?php if(isset($msg)): ?>
    <div class="bg-green-100 border border border-green-400 text-green-700 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline"><?php echo $msg ?></span>
    </div>
<?php endif; ?>

<form action="update.php?id=<?= $_GET['id'] ?>" method="POST">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Title
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               value="<?= htmlspecialchars($post['title']) ?>"
               id="title" name="title" type="text" placeholder="Title">
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
            Content
        </label>
        <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="content" name="content" placeholder="Content"><?= $post['content'] ?></textarea>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
            Submit
        </button>

        <a href="index.php"
           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
           type="submit">
            Cancel
        </a>
    </div>
</form>
</body>
</html>

