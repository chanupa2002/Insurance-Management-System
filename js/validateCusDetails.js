function validateForm() {
    var password = document.getElementById("password").value; // Assuming the input ID is "password"
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

    var mobile = document.getElementById("mobile").value; // Assuming the input ID is "mobile"

    // Check if mobile number is valid
    if (mobile.length !== 10 || isNaN(mobile)) {
        alert("Recheck your Mobile Number !");
        return false;
    }

    // Allow form submission if all conditions are met
    return true;
}
