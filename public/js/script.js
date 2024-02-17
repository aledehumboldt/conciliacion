let panelSection = document.querySelector(".window-panel");

function showHidePanel() {
    panelSection.classList.toggle("hide");
}  


document.getElementById('id-sun').onclick = function(){
    document.getElementById('page').classList.remove('dark-mode')
    document.getElementById('id-moon').classList.remove('active')
    this.classList.add('active')
  }
  /*Si clicamos en el botón de la luna, añadiremos la clase css dark-mode del div 
  con id page y se aplicará el estilo active a la luna*/
  document.getElementById('id-moon').onclick = function(){
    document.getElementById('page').classList.add('dark-mode')
    document.getElementById('id-sun').classList.remove('active')
    this.classList.add('active')
  }
// let isShow = true;

// function showHidePanel() {
//     if (isShow) {
//         panelSection.style.display = "none";
//         isShow = false;
//     } else {
//         panelSection.style.display = "block";
//         isShow = true;
//     }   
// }
