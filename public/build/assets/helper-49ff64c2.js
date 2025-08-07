const o=document.querySelectorAll(".zoomable-img"),c=document.getElementById("zoomImage");o.forEach(e=>{e.addEventListener("click",()=>{const t=e.getAttribute("data-img");c.setAttribute("src",t)})});
