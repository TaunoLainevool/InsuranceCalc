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
    <input id= 'value' type="text" name="value">
    <br>
    <label>Tax precentage</label>
    <input id= 'tax' type="text" name="percentage">
    <br>
    <label>Number of instalments</label>
    <input id= 'instalment' type="text" name="instalments">
    <br>
    <button type="submit">Calculate</button>
</form>
</div>
</body>
</html>    

<script type="text/javascript">
    var offset = new Date().getHours();
    document.getElementById('time').value = offset;


    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
            });
        });
    }
    setInputFilter(document.getElementById("value"), function(value) {
        return /^\d*$/.test(value); });
    setInputFilter(document.getElementById("tax"), function(value) {
        return /^\d*$/.test(value); });
    setInputFilter(document.getElementById("instalment"), function(value) {
        return /^\d*$/.test(value); });
</script>