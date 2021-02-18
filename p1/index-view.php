<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Project One</title>
    <meta charset='utf-8'>
</head>

<body>
    <form method="GET" action="process.php">
        <h1>String Processor - e15 Project 1</h1>
        <label for='input'>Enter a word or phrase here</label>
        <input type='text' name='input' id='input'>
        <button type='submit'>Submit</button>
    </form>

    <?php if($results): ?>
    <div id='results'>
        <h4>Submitted Word or Phrase</h4>
        <p>You entered "<?=$input ?>"</p>
        <h4>Vowel Count</h4>
        <p>The total number of vowels is: <?=$vowelCount?></p>
        <h4>Is It a Palidrome?</h4>
        <p>"<?=$input?>"<?=$isPali?></p>
    </div>
    <?php endif ?>
</body>

</html>