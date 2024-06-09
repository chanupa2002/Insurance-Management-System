
function validateForm() {
        
    var password = document.getElementById("newpassword").value; // Assuming the input ID is "password"
    var confirmPassword = document.getElementById("confirmpassword").value; // Assuming the input ID is "confirmpassword"
    
    // Check if passwords match
    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false; // Prevent form submission
    }

    // Check if password meets criteria
    if (!password.match(/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/)) {
        alert("Password must include:\n• At least 8 characters\n• At least one capital letter\n• At least one special character !");
        return false;
    }
    
    // If passwords match, allow form submission
    return true;
    
}
    