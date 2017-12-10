$(document).ready(function(){
    var errorCode = document.getElementById("errorId").textContent;
    switch(errorCode) {
        case "1":
            $('#errorId').text("Invalid username");
            $('#userField').css('border-color', 'red');
            
            $('#userField').on('input', function() {
                $('#errorId').text("");
                $('#userField').css('border-color', 'grey');
            });
            break;
        case "2":
            $('#errorId').text("Invalid password");
            $('#passField').css('border-color', 'red');
            
            $('#passField').on('input', function() {
                $('#errorId').text("");
                $('#passField').css('border-color', 'grey');
            });
            break;
            
        default:
            break;
    }
});