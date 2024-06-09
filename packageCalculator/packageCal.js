var package=document.getElementById("dropdown1");
var group=document.getElementById("dropdown2");
var org=document.getElementById("dropdown3");
var calculate=document.getElementById("btn");
var discount;
var pack;
var amount;
var finalvalue;
  

 
group.addEventListener('change',()=>
{
    if(group.value == "Family"){
        
        org.disabled=true;
    }
    else{
        
        org.disabled=false;
    }
})

calculate.addEventListener("click",()=>{
    if(package.value=="Platinum"){
        pack=5000;
      
       
    }
    else if(package.value=="Silver"){
       pack=7000;
   }
   
    else if(package.value=="gold"){
       pack=10000;
    }
    var people=document.getElementById("people").value;
    if(group.value == "Family"){
        
        if(people>=6){
            discount=10/100;
        }
        else{
            discount=0;
        }

    }
    else{
        if(people>=25){
            if(org.value=="gov"){
                discount=20/100;
            }
            else if(org.value=="nongov"){
                discount=10/100;
            }
            else if(org.value=="school"){
                discount=15/100;
            }
            else if(org.value=="Private"){
                discount=5/100;
            }
            else if(org.value=="uni"){
                discount=8/100;
            }
        }
        else{
            discount=0;
        }
    }
    
    amount=pack * people; 
    finalvalue=amount-amount*discount;
    document.getElementById("amount").innerHTML=finalvalue;

})