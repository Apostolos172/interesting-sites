function openAllAnchorsToNewTab() {
  var links = document.getElementsByTagName("a");
  var len = links.length;

  for (var i = 2; i < len; i++) {
    links[i].target = "_blank";
  }
}

function defineColorsAtGroups() {
  document.addEventListener("DOMContentLoaded", function () {
    let groupOfSitesCards = window.document.querySelectorAll("div.group_div");
    //console.log(groupOfSitesCards);
    for (let i = 0; i < groupOfSitesCards.length; i++) {
      customizeBackgroundOfGroup(groupOfSitesCards[i]);
    }
  });
}

function customizeBackgroundOfGroup(groupOfSitesCard) {
  let red = between(0, 255);
  let green = between(0, 255);
  let blue = between(0, 255);
  let color = "rgb(".concat(red, ",", green, ",", blue, ")");
  let colorOrImage = between(0, 1);
  switch (colorOrImage) {
    case 0:
      groupOfSitesCard.style.backgroundColor = color;
      break;
    case 1:
      groupOfSitesCard.style.backgroundImage = "linear-gradient(140deg,".concat(
        color,
        " 0%, white 50%, ",
        color,
        " 75%)"
      );
      break;
    default:
      groupOfSitesCard.style.backgroundColor = color;
  }
}

/**
 * Returns a random number between min (inclusive) and max (inclusive)
 */
function between(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}
