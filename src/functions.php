<?php

function connection($host, $database, $username , $password)
{
    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function listAll($connection)
{
    $statement = $connection->prepare("SELECT * FROM posts");
    $statement ->execute();
    $statement ->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement ->fetchAll();
    return $posts;
}

function create($connection, $title, $content)
{
    $stmt = $connection->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
    $stmt->execute(['title' => $title, 'content' => $content]);
}

function read($connection, $id)
{
    $stmt = $connection->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $post = $stmt->fetch();
    return $post;
}

function update($connection, $id, $title, $content)
{
    $stmt = $connection->prepare("UPDATE posts SET title=:title, content=:content WHERE id=:id");
    $stmt->execute(['title' => $title, 'content' => $content, 'id' => $id]);
}

function delete($connection, $id)
{
    $stmt = $connection->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
}