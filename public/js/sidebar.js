const arrowParentSelector = '.arrow-parent';
const arrowSelector = '.arrow';
const sidebarSelector = '.sidebar';
const sidebarBtnSelector = '.bx-menu';

const arrowParent = document.querySelector(arrowParentSelector);
const sidebar = document.querySelector(sidebarSelector);
const sidebarBtn = document.querySelector(sidebarBtnSelector);

arrowParent.addEventListener('click', (e) => {
  const arrow = e.target.closest(arrowSelector);
  if (arrow) {
    const arrowParent = arrow.closest(arrowParentSelector);
    arrowParent.classList.toggle('showMenu');
  }
});

sidebarBtn.addEventListener('click', () => {
  sidebar.classList.toggle('close');
});

// let arrow = document.querySelectorAll(".arrow");
// for (var i = 0; i < arrow.length; i++) {
//   arrow[i].addEventListener("click", (e) => {
//     let arrowParent = e.target.parentElement.parentElement; // Selecting main parent of arrow
//     arrowParent.classList.toggle("showMenu");
//   });
// }

// let sidebar = document.querySelector(".sidebar");
// let sidebarBtn = document.querySelector(".bx-menu");
// // console.log(sidebarBtn);
// sidebarBtn.addEventListener("click", () => {
//   sidebar.classList.toggle("close");
// });

