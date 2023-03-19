function openForm(formSelector) {
  formSelector.classList.remove("hide");
  document.querySelector(".overlay").classList.remove("hide");
}

function closeForm(formSelector) {
  formSelector.classList.add("hide");
  document.querySelector(".overlay").classList.add("hide");
  formSelector.reset();
}

function toggleDisplayForm(formSelector, openBtnSelector, closeBtnSelector) {
  openBtnSelector.addEventListener("click", () => {
    openForm(formSelector);
  });
  closeBtnSelector.addEventListener("click", () => {
    closeForm(formSelector);
  });
}