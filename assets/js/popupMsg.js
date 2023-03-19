function createPopupMsg(status, msg) {
  var popupMsgBox = document.createElement("div");
  popupMsgBox.classList.add("popup-msg", status);
  document.body.appendChild(popupMsgBox);

  if (status == "success") {
    popupMsgBox.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    popupMsgBox.classList.add('success');
  } else if (status == "fail") {
    popupMsgBox.innerHTML = '<i class="fa-solid fa-xmark"></i>';
    popupMsgBox.classList.add('fail');
  } else if (status == "warning") {
    popupMsgBox.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i>';
    popupMsgBox.classList.add('warning');
  } else if (status == "info") {
    popupMsgBox.innerHTML = '<i class="fa-solid fa-circle-info"></i>';
    popupMsgBox.classList.add('info');
  }

  popupMsgBox.innerHTML += `<div>
                                <p class="popup-msg-status"> ${capitalize(status)} </p>
                                <p class="popup-msg-content"> ${msg} </p>
                                <button class="popup-msg-btn" onclick="hidePopupMsg()"> OK </button>
                            </div>`;
  displayPopupMsg();
}
function capitalize(word) {
  return word.charAt(0).toUpperCase() + word.slice(1);
}

function hidePopupMsg() {
  document.querySelector(".popup-msg").remove();
  document.querySelector(".overlay").classList.add("hide");
}

function displayPopupMsg() {
  var popupMsg = document.querySelector(".popup-msg");
  document.querySelector(".overlay").classList.remove("hide");
  // popupMsg.style.left = "70px";
  // popupMsg.style.bottom = "30px";
  popupMsg.style.opacity = "1";
  popupMsg.style.transition = "1s";
  // setTimeout(hidePopupMsg, 6000);
}

if (document.body.contains(document.querySelector(".popup-msg")) && !document.querySelector(".popup-msg").classList.contains("hide")) {
  document.body.onkeyup = function (e) {
    if (e.key == " " || e.code == "Space" || e.keyCode == 13) {
      hidePopupMsg();
    }
  };
}
