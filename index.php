<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div id='form'>
<form action="work.php" method="POST">
    <input id ="time" type="hidden" name="time">
    <label>Car value</label>
    <input type="text" name="value">
    <br>
    <label>Tax precentage</label>
    <input type="text" name="percentage">
    <br>
    <label>Number of instalments</label>
    <input type="text" name="instalments">
    <br>
    <button type="submit">Calculate</button>
</form>
</div>
</body>
</html>    

<script type="text/javascript">
    var offset = new Date().getHours();
    document.getElementById('time').value = offset;
</script>