function validate(){

    var Aname = document.getElementById("adminName").value;         //getting and assigning admin name to a new variable
    var Apassword = document.getElementById("adminPassword").value;         //getting and assigning admin password to a new variable

    if(Aname == "admin" && Apassword == "admin123"){            //checking admin username and password
        document.getElementById("desc").innerText="Login Successful";
        window.location.href = "adminHome.php";
    }
    else{
        document.getElementById("desc").innerText="Login Unsuccessful";     //printing admin username and password are incorrect
    }

}