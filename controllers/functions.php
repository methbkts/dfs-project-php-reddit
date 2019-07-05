<?php

/**
 * Stored Procedure to get all Articles from Database and fetch them
 * @return array
 */
function getArticles()
{
  $sql = "SELECT title, content, image, date, users.name as author, categories.name as category FROM articles LEFT JOIN users ON articles.user_id=users.id LEFT JOIN categories ON articles.category_id=categories.id";
  // $sql = "CALL sp_GetArticles()";
  $mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
  if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
      . $mysqli->connect_error);
  }
  $request = mysqli_query($mysqli, $sql);
  $result = mysqli_fetch_assoc($request);
  $mysqli->close();
  return $result;
}
/**
 * Stored Procedure to get all Categories from Database and fetch them
 * @return array
 */
function getCategories()
{
  $sql = "SELECT name as category FROM categories";
  // $sql = "CALL sp_GetCategories()";
  $mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
  if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
      . $mysqli->connect_error);
  }
  $request = mysqli_query($mysqli, $sql);
  $result = mysqli_fetch_assoc($request);
  $mysqli->close();
  return $result;
}
/**
 * Stored Procedure to get all Users from Database and fetch them
 * @return array
 */
function getUsers()
{
  $sql = "SELECT name, role FROM users";
  // $sql = "CALL sp_GetUsers()";
  $mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
  if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
      . $mysqli->connect_error);
  }
  $request = mysqli_query($mysqli, $sql);
  $result = mysqli_fetch_assoc($request);
  // var_dump($result);die;
  $mysqli->close();
  return $result;
}
/**
 * Stored Procedure to get the User Id from Database
 * @param string $username
 * @return int
 */
function getUserId($username)
{
  $sql = "SELECT id FROM users WHERE name = '$username'";
  // $sql = "CALL sp_GetUser_Id('$username')";
  $mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
  if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
      . $mysqli->connect_error);
  }
  $request = mysqli_query($mysqli, $sql);
  $result = mysqli_fetch_assoc($request);
  // var_dump($result);die;
  $mysqli->close($mysqli);
  return $result;
}
//
//
//
function checkRole($username)
{
  $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $request = $connec->prepare("SELECT role FROM users WHERE name= :username;");
  $request->execute([
    ":username" => $username
  ]);
  // var_dump(intval($request->fetch(PDO::FETCH_ASSOC)["role"]));die;
  return intval($request->fetch(PDO::FETCH_ASSOC)["role"]);
}

// Get all Articles from Database and fetch them
function getAllArticles()
{
  try {
    $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT title, content, image, date, users.name as author, categories.name as category FROM articles LEFT JOIN users ON articles.user_id=users.id LEFT JOIN categories ON articles.category_id=categories.id ;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("Error occurred:" . $e->getMessage());
  }
}

function getAllCategories()
{
  $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT name FROM categories;");
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllUsers()
{
  $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT * FROM users;");
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getOneUser($mail, $password)
{
  $connec = new PDO('mysql:dbname=app_db; charset=utf8mb4', 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT id, name FROM users WHERE mail = :mail AND password = :password;");
  $request->execute([
    ":mail" => $mail,
    ":password" => $$pass_hache,
  ]);
  return $request->fetch(PDO::FETCH_ASSOC);
}

function checkPassword($username)
{
  $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT password FROM users WHERE name= :username;");
  $request->execute([
    ":username" => $username
  ]);
  return $request->fetchAll(PDO::FETCH_ASSOC)[0]["password"];
}

// function checkRole($username)
// {
//   $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
//   $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $request = $connec->prepare("SELECT role FROM users WHERE name= :username;");
//   $request->execute([
//     ":username" => $username
//   ]);
//   return intval($request->fetchAll(PDO::FETCH_ASSOC)[0]["role"]);
// }

function insertArticle($title, $categories, $content, $image, $author)
{

  $connec = new PDO("mysql:dbname=app_db; charset=utf8mb4", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("INSERT INTO articles(title, categorie, content, image, author) VALUES (:title, :content, :image, :author);");
  $request->execute([
    ":title" => $title,
    ":content" => $content,
    ":categories" => $categories,
    ":image" => $image,
    ":author" => $author,
  ]);
}
