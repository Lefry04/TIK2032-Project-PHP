<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "portofolio"; // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM artikel ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .artikel {
            margin-top: 10%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 41px;
            margin-bottom: 0;
        }

        article {
            margin-top: 5%;
            width: 545px;
            display: flex;
            background-color: #E2E2B6;
            padding: 1%;
            border-radius: 20px;
            align-items: center;
            color: #021526;
        }

        .list-artikel {
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        h2 {
            width: 200px;
        }

        p {
            width: 315px;
            padding: 3%;
        }

        .list-artikel a {
            color: #021526;
        }

        .garis {
            width: 1px;
            height: 80%;
            background-color: #021526;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="nav-bar">
        <a href="index.html">Home</a>
        <a href="gallery.html">Gallery</a>
        <a href="blog.php">Blog</a>
        <a href="contact.html">Contact</a>
    </div>

    <section class="artikel">
        <div class="title">
            <h1>My Favourite Blog</h1>
            <div class="line"></div>
        </div>
        <div class="list-artikel">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <article>
                        <h2><a href="<?= htmlspecialchars($row['url']) ?>" target="_blank"><?= htmlspecialchars($row['judul']) ?></a></h2>
                        <div class="garis"></div>
                        <p><?= htmlspecialchars(substr($row['isi'], 0, 150)) ?>...</p>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada artikel yang tersedia.</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>

<?php $conn->close(); ?>
