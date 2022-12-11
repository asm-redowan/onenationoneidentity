// let accordion = document.getElementsByClassName('portion');
// for(let i=0; i<accordion.length; i++){
//     accordion[i].addEventListener('click',function(){
//         this.classList.toggle('active');
//     })
// }

//With a function, I am able to perform multiple tasks 
function SwitchButtons(buttonId) {
    var hideBtn, showBtn, menuToggle;
    if (buttonId == 'button1') {
      menuToggle = 'menu2';
      showBtn = 'button2';
      hideBtn = 'button1';
    } else {
      menuToggle = 'menu3';
      showBtn = 'button1';
      hideBtn = 'button2';
    }
    //I don't have your menus, so this is commented out.  just uncomment for your usage
    // document.getElementById(menuToggle).toggle(); //step 1: toggle menu
    document.getElementById(hideBtn).style.display = 'none'; //step 2 :additional feature hide button
    document.getElementById(showBtn).style.display = ''; //step 3:additional feature show button
  
  
  }