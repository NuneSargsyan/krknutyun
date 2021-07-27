var windows=document.querySelector(".window");
var  moveing=false;
windows.addEventListener("mousedown",function(){
    moveing=false;
    window.addEventListener("mousemove",function(e){
        if(moveing==false){
            var x=e.clientX;
            var y=e.clientY;
            windows.style.left=x+"px";
            windows.style.top=y+"px";
        }
    })
})
windows.addEventListener("mouseup",function(){
    moveing=true;
})

var send=document.querySelectorAll(".send");
let opening = false
for(let key of send){
    let windows = key.parentElement.parentElement.querySelector('.window');
    key.addEventListener("click",function(){
        if(opening==false){
            windows.style.display="block";
            opening=true;
        }else{
            windows.style.display="none";
            opening=false;
        }
    })
}
