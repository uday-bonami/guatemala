const staticsCards = document.getElementsByClassName("statics-card");
let lastActiveCard = document.getElementsByClassName("card-activate")[0];

function startRipple() {
  if (staticsCards.length !== 0) {
    for (let card of staticsCards) {
      card.onclick = (event) => {
        const card = event.currentTarget;
        const ripple = document.createElement("span");
        ripple.className = "ripple";
        const diameter = Math.max(card.clientWidth, card.clientHeight);
        const radius = diameter / 2;
        ripple.style.width = `${diameter}px`;
        ripple.style.height = `${diameter}px`;
        ripple.style.left = `${
          event.clientX - (card.getBoundingClientRect().x + radius)
        }px`;
        ripple.style.top = `${
          event.clientY - (card.getBoundingClientRect().y + radius)
        }px`;
        const rippleClass = card.getElementsByClassName("ripple")[0];
        if (rippleClass) {
          rippleClass.remove();
        }
        card.appendChild(ripple);
        if (!card.classList.contains("card-activate")) {
          card.style.backgroundColor = "#8CF0F0";
          if (lastActiveCard && lastActiveCard !== card) {
            lastActiveCard.style.backgroundColor = "#D4FFFF";
            lastActiveCard.classList.remove("card-activate");
          }
          card.classList.add("card-activate");
          lastActiveCard = card;
        }
      };
    }
  }
}

function main() {
  startRipple();
  popupSetup();
}

function popupSetup() {
  const openButton = document.getElementById("open-popup");
  const popupCloseButtons = document.getElementsByClassName("popup-close");
  if (openButton) {
    openButton.onclick = () => {
      const popup = document.getElementById("popup");
      if (popup) {
        popup.style.display = "flex";
      }
    };
  }

  if (popupCloseButtons.length !== 0) {
    for (let button of popupCloseButtons) {
      button.onclick = () => {
        const popup = document.getElementById("popup");
        if (popup) {
          popup.style.display = "none";
        }
      };
    }
  }
}

main();
