<?php
    /** var [] $result */
?>

<?php while($row = mysqli_fetch_assoc($result)) :?>
    <h2><?= $row['fio'] ?></h2>
    <p><a href="?page=3&id=<?= $row['id'] ?>">Подробнее</a></p>
<?php endwhile;?>
