class Header {
  constructor() {}

  static transitionForDownArrow() {
    let downArrowIcon = document.getElementsByClassName(
      "la-angle-double-down"
    )[0];

    async function createTransition(initialTime, start, startChange, end) {
      if (start < end) {
        while (start < end) {
          await new Promise(resolve => {
            setTimeout(() => {
              resolve((downArrowIcon.style.bottom = `-${start}px`));
            }, initialTime);
          });
          start += startChange;
        }
      } else if (start > end) {
        while (start > end) {
          await new Promise(resolve => {
            setTimeout(() => {
              resolve((downArrowIcon.style.bottom = `-${start}px`));
            }, initialTime);
          });
          start -= startChange;
        }
      } else {
        return;
      }
    }

    createTransition(30, 4, 0.5, 12).then(() => {
      createTransition(30, 12, 0.5, 4).then(() => {
        createTransition(30, 4, 0.5, 12).then(() => {
          createTransition(30, 12, 0.5, 4);
        });
      });
    });

    return;
  }

  static toggleNavBar() {
    const navbarDisplayStatus = document.getElementById("navbar-menu-container")
      .style.display;

    if (navbarDisplayStatus === "none") {
      document.getElementById("navbar-menu-container").style.display = "block";
    } else if (navbarDisplayStatus === "block") {
      document.getElementById("navbar-menu-container").style.display = "none";
    } else {
      document.getElementById("navbar-menu-container").style.display = "block";
    }

    return;
  }
}
