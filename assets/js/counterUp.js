var statisticContainer = document.querySelector(".statistic-container");
var statisticList = document.querySelectorAll(".statistic-item");

function counterUp(el) {
  var numberEl = el.querySelector(".statistic-item__number");
  numberEl.classList.add("finish");
  var end = parseInt(numberEl.innerText);
  var count = 0;
  var time = 200;
  var step = end / time;

  let counting = setInterval(() => {
    count += step;
    if (count > end) {
      clearInterval(counting);
      numberEl.innerText = end + " +";
    } else {
      numberEl.innerText = Math.round(count) + " +";
    }
  }, 5);
}

window.onscroll = function () {
  var rectStatistic = statisticContainer.getBoundingClientRect();
  var heightScreen = window.innerHeight;
   if (!document.querySelector(".statistic-item__number").classList.contains('finish')) {
    if (!(rectStatistic.bottom < 0 || rectStatistic.top > heightScreen)) {
        statisticList.forEach((item) => {
            counterUp(item);
          });
      }
   }
};
