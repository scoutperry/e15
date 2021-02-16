<!DOCTYPE html>
<html lang='en'>

<head>

    <title>Project One</title>
    <meta charset='utf-8'>

</head>

<body>


    <p>
    </p>

    <form method="GET" action="process.php">
        <h1>String Processor - e15 Project 1</h1>
        <label for='input'>Enter a word or phrase here</label>
        <input type='text' name='input' id='input'>
        <button type='submit'>Submit</button>
    </form>

    <?php if($results){ ?>
    <div id='results'>
        <p>You entered <?php echo $input;?></p>
        <p>the total number of vowels is <?php echo $vowelCount;?></p>
        <p><?php echo $input; echo $isPali;?></p>

    </div>
    <?php } ?>

</body>

</html>