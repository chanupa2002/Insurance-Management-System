let nextbtn = document.getElementById("nextbtn");
let backbtn=document.getElementById("backbtn");
let thirdpanel = document.getElementsByClassName("adcontainer")[0]; 
let mainpanel = document.getElementsByClassName("cuspanel")[0]; 

nextbtn.addEventListener("click", () => {
    
    thirdpanel.style.display = "block"; 
    mainpanel.style.display = "none"; 
    nextbtn.style.display="none";
    backbtn.style.display="block";
});
backbtn.addEventListener("click",()=>{
    thirdpanel.style.display="none";
    mainpanel.style.display="block";
    backbtn.style.display="none";
    nextbtn.style.display="block";
})