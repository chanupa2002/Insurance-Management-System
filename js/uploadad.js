function displayFileName() {
    
    const fileInput = document.getElementById('fileupload');
    
    // Get the span element where we will display the file name by its ID
    const fileName = document.getElementById('filename');
    
    // Set the text content of the span element to display the selected file's name
    fileName.value = "Selected File: " + fileInput.files[0].name;
  }
  


function confirmAndRedirect(message, redirectUrl) {
        if (confirm(message)) {
            window.location.href = "deleteAllNotices.php";
            return true;
        }
        return false;
  }

