var a;

function getItem(){
        //get value from input field and set to a
        a = document.getElementById("username").value;
        //create local storage key with value of "a"
        localStorage.setItem("uName", a);
        //automatically take user to page 2.html
        location.href = "two.html";
}
