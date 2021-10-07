"use strcit";

const counter = document.querySelectorAll(".DataNumber");
const sectionTwoCounter = document.querySelector(".sectionTwoCounter");

const option = {
  root: null,
  threshold: "0",
  rootMargin: "-120px",
};

const CallBack = (entries, observe) => {
  entries.forEach((item) => {
    if (!item.isIntersecting) {
      return;
    }

    if (item.isIntersecting === true) {
      // update the timer
      counter.forEach((item) => {
        const updateTimer = function () {
          // grab the dom attribute
          const target = Number(item.getAttribute("data-Number"));
          const speed = 200;
          const value = +item.innerHTML;
          const delay = target / speed;

          if (value < target) {
            item.innerHTML = (value + delay).toFixed(0);
            setTimeout(updateTimer, 1);
          }
        };

        // call the funtion
        updateTimer();
      });
    }
  });
};

const observer = new IntersectionObserver(CallBack, option);

observer.observe(sectionTwoCounter);
