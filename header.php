<?php wp_head() ?>
<?php include("classes/headerClass.php") ?>
<?php
$header_instance = new Header(get_bloginfo('name'), get_bloginfo('description'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variety-Shopping</title>
</head>

<body onload="Header.transitionForDownArrow()">
    <header>
        <div class="header-container">
            <h1 class="header-title"><?php echo $header_instance->getTitle(); ?></h1>
            <h2 class="header-description"><?php echo $header_instance->getDescription(); ?></h2>
            <i class="las la-angle-double-down"></i>
        </div>
    </header>