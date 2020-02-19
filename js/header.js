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

    createTransition(30, 6, 0.5, 14).then(() => {
      createTransition(30, 14, 0.5, 6).then(() => {
        createTransition(30, 6, 0.5, 14).then(() => {
          createTransition(30, 14, 0.5, 6);
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
