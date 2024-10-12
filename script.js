let money = 0;
let tajcoin = 1;
let bot = 0;
let storage = 0;


window.onload = function() {
  if(localStorage.getItem("farmData")) {
    let savedData = JSON.parse(localStorage.getItem("farmData"));
    money = savedData.money;
    tajcoin = savedData.tajcoin;
    bot = savedData.bot;
    storage = savedData.storage;

    updateDisplay();
  }
}

setInterval(botadd, 1000);

function botadd() {
  bot += tajcoin;
  updateBots();
  saveData(); 
}

function collect() {
  if (bot >= 500) {
    storage += bot;
    bot = 0;
    updateStorage();
    updateBots();
    saveData(); 
  } else {
    
  }
}

function sell() {
  if (storage >= 5000) {
    money += storage;
    storage -= 5000;
    updateMoney();
    updateStorage();
    saveData(); 
  } else {
    
  }
}

function buy() {
  if (money >= 10000) {
    tajcoin++;
    money -= 10000;
    updateMoney();
    updateTajcoin();
    saveData(); 
  } else {
    
  }
}


function saveData() {
  let farmData = {
    money: money,
    tajcoin: tajcoin,
    bot: bot,
    storage: storage
  };
  localStorage.setItem("farmData", JSON.stringify(farmData));
}


function updateMoney() {
  document.getElementById("moneyid").innerHTML = " " + money.toLocaleString();
}

function updateTajcoin() {
  document.getElementById("tajcoinid").innerHTML = " " + tajcoin.toLocaleString();
}

function updateBots() {
  document.getElementById("botid").innerHTML = " " + bot.toLocaleString();
}

function updateStorage() {
  document.getElementById("storageid").innerHTML = " " + storage.toLocaleString();
}

function updateDisplay() {
  updateMoney();
  updateTajcoin();
  updateBots();
  updateStorage();
}




const showModalBtn = document.querySelector(".show-modal");
const bottomSheet = document.querySelector(".bottom-sheet");
const sheetOverlay = bottomSheet.querySelector(".sheet-overlay");
const sheetContent = bottomSheet.querySelector(".content");
const dragIcon = bottomSheet.querySelector(".drag-icon");


let isDragging = false, startY, startHeight;


const showBottomSheet = () => {
    bottomSheet.classList.add("show");
    document.body.style.overflowY = "hidden";
    updateSheetHeight(50);
}

const updateSheetHeight = (height) => {
    sheetContent.style.height = `${height}vh`; 
     
    bottomSheet.classList.toggle("fullscreen", height === 100);
}


const hideBottomSheet = () => {
    bottomSheet.classList.remove("show");
    document.body.style.overflowY = "auto";
}


const dragStart = (e) => {
    isDragging = true;
    startY = e.pageY || e.touches?.[0].pageY;
    startHeight = parseInt(sheetContent.style.height);
    bottomSheet.classList.add("dragging");
}


const dragging = (e) => {
    if(!isDragging) return;
    const delta = startY - (e.pageY || e.touches?.[0].pageY);
    const newHeight = startHeight + delta / window.innerHeight * 100;
    updateSheetHeight(newHeight);
}


const dragStop = () => {
    isDragging = false;
    bottomSheet.classList.remove("dragging");
    const sheetHeight = parseInt(sheetContent.style.height);
    sheetHeight < 25 ? hideBottomSheet() : sheetHeight > 75 ? updateSheetHeight(100) : updateSheetHeight(50);
}

dragIcon.addEventListener("mousedown", dragStart);
document.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);

dragIcon.addEventListener("touchstart", dragStart);
document.addEventListener("touchmove", dragging);
document.addEventListener("touchend", dragStop);

sheetOverlay.addEventListener("click", hideBottomSheet);
showModalBtn.addEventListener("click", showBottomSheet);

//loading function
gsap.fromTo(
  ".loading-page",
  { opacity: 1 },
  {
    opacity: 0,
    display: "none",
    duration: 1.5,
    delay: 5.5,
  }
);

gsap.fromTo(
  ".logo-name",
  {
    y: 50,
    opacity: 0,
  },
  {
    y: 0,
    opacity: 1,
    duration: 2,
    delay: 0.5,
  }
);






