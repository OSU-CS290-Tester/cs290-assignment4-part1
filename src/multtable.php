<?php
    $min_multiplicand = $_GET["min-multiplicand"];
    $max_multiplicand = $_GET["max-multiplicand"];
    
    $min_multiplier = $_GET["min-multiplier"];
    $max_multiplier = $_GET["max-multiplier"];
    
    $errors = [];
    
    if ($min_multiplicand == null) {
        $errors[] = "Missing parameter min-multiplicand";
    } elseif (!is_numeric($min_multiplicand)) {
        $errors[] = "min-multiplicand must be an integer";
    } else {
        $min_multiplicand = (int) $min_multiplicand;
    }
    
    if ($max_multiplicand == null) {
        $errors[] = "Missing parameter max-multiplicand";
    } elseif (!is_numeric($max_multiplicand)) {
        $errors[] = "max-multiplicand must be an integer";
    } else {
        $max_multiplicand = (int) $max_multiplicand;
    }
    
    if ($min_multiplier == null) {
        $errors[] = "Missing parameter min-multiplier";
    } elseif (!is_numeric($min_multiplier)) {
        $errors[] = "min-multiplier must be an integer";
    } else {
        $min_multiplier = (int) $min_multiplier;
    }
    
    if ($max_multiplier == null) {
        $errors[] = "Missing parameter max-multiplier";
    } elseif (!is_numeric($max_multiplier)) {
        $errors[] = "max-multiplier must be an integer";
    } else {
        $max_multiplier = (int) $max_multiplier;
    }
    
    
    if ($min_multiplicand > $max_multiplicand) {
        $errors[] = "Minimum multiplicand larger than maximum.";
    }
    
    if ($min_multiplier > $max_multiplier) {
        $errors[] = "Minimum multiplier larger than maximum.";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>multtable</title>
    </head>
    <body>
        <?php if (count($errors) > 0) { ?>
            <h3>Errors:</h3>
            <ul>
                <?php foreach ($errors as $error) {
                    echo "<li>$error</li>";
                } ?>
            </ul>
        <?php } else { ?>
            <table>
                <tbody>
                    <?php for ($i = $min_multiplicand-1; $i <= $max_multiplicand; $i++) { ?>
                        <tr>
                        <?php for ($j = $min_multiplier-1; $j <= $max_multiplier; $j++) {
                            if ($i < $min_multiplicand) { // First row
                                if ($j < $min_multiplier) { // Top left ?>
                                    <td></td>
                                <?php } else { // Echo multipliers ?>
                                    <td><?php echo $j; ?></td>
                                <?php }
                            } else {
                                if ($j < $min_multiplier) { // First column ?>
                                    <td><?php echo $i; ?></td>
                                <?php } else { ?>
                                    <td><?php echo $i*$j; ?></td>
                                
                                <?php }
                            }
                        } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </body>
</html>
