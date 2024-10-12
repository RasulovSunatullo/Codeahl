// Унсурҳои DOM-ро интихоб кунед
const showModalBtn = document.querySelector(".show-modal");
const bottomSheet = document.querySelector(".bottom-sheet");
const sheetOverlay = bottomSheet.querySelector(".sheet-overlay");
const sheetContent = bottomSheet.querySelector(".content");
const dragIcon = bottomSheet.querySelector(".drag-icon");

// Тағирёбандаҳои глобалӣ барои пайгирии рӯйдодҳои кашолакунӣ
let isDragging = false, startY, startHeight;

// Варақи поёнро нишон диҳед, панели ҳаракати амудии баданро пинҳон кунед ва updateSheetHeight -ро даъват кунед
const showBottomSheet = () => {
    bottomSheet.classList.add("show");
    document.body.style.overflowY = "hidden";
    updateSheetHeight(50);
}

const updateSheetHeight = (height) => {
    sheetContent.style.height = `${height}vh`; //баландии мундариҷаи варақро нав мекунад
     // Агар баландӣ ба 100 баробар бошад, синфи пурраи экранро ба поёни Sheet иваз мекунад
    bottomSheet.classList.toggle("fullscreen", height === 100);
}

// Варақи поёнро пинҳон кунед ва панели ҳаракати амудии баданро нишон диҳед
const hideBottomSheet = () => {
    bottomSheet.classList.remove("show");
    document.body.style.overflowY = "auto";
}

// Мавқеи ибтидоии кашолакунӣ, баландии варақи мундариҷаро муқаррар мекунад ва синфи кашолакуниро ба варақи поён илова мекунад
const dragStart = (e) => {
    isDragging = true;
    startY = e.pageY || e.touches?.[0].pageY;
    startHeight = parseInt(sheetContent.style.height);
    bottomSheet.classList.add("dragging");
}

// Баландии навро барои мундариҷаи варақ ҳисоб мекунад ва функсияи updateSheetHeight -ро даъват мекунад
const dragging = (e) => {
    if(!isDragging) return;
    const delta = startY - (e.pageY || e.touches?.[0].pageY);
    const newHeight = startHeight + delta / window.innerHeight * 100;
    updateSheetHeight(newHeight);
}

// Муайян мекунад, ки оё пинҳон кардан, ба экрани пурра гузоштан ё ба пешфарз гузоштан 
 // баландӣ дар асоси баландии ҷории мундариҷаи варақ
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

//профил



