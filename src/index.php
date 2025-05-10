<?php

include 'functions.php';

$connection = connection('mysql', 'CRUD_db', 'user', '123');
$posts = listAll($connection);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-w-4xl mx-auto space-y-10 py-10">
<div class="flex items-center justify-between">
    <h1 class="text-3xl font-bold underline">List</h1>
    <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</a>
</div>

<table class="table-auto w-full">
    <thead>
    <tr>
        <th class="px-4 py-2 text-left">Title</th>
        <th class="px-4 py-2 text-left">Content</th>
        <th class="px-4 py-2 text-left">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td class="border p-4"><?php echo $post['title']; ?></td>
            <td class="border p-4"><?php echo $post['content']; ?></td>
            <td class="border p-4">
                <a href="update.php?id=<?php echo $post['id']; ?>"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit
                </a>
                &nbsp;
                <a href="delete.php?id=<?php echo $post['id']; ?>"
                   onclick="return confirm('Are you sure to delete this post?');"
                   class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
