class Header {
  constructor() {}

  static toggleMenu() {
    const header_links = document.getElementsByClassName(
      "header-page-links"
    )[0];
    if (header_links.style.display === "flex") {
      header_links.style.display = "none";
    } else {
      header_links.style.display = "flex";
    }
  }

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

    createTransition(30, 1, 0.5, 9).then(() => {
      createTransition(30, 9, 0.5, 1).then(() => {
        createTransition(30, 1, 0.5, 9).then(() => {
          createTransition(30, 9, 0.5, 1);
        });
      });
    });

    return;
  }

  static toggleNavBar() {
    const navbarDisplayStatus = document.getElementsByClassName(
      "navbar-main-container"
    )[0].style.display;

    if (navbarDisplayStatus === "none") {
      document.getElementsByClassName(
        "navbar-main-container"
      )[0].style.display = "block";
    } else if (navbarDisplayStatus === "block") {
      document.getElementsByClassName(
        "navbar-main-container"
      )[0].style.display = "none";
    } else {
      document.getElementsByClassName(
        "navbar-main-container"
      )[0].style.display = "block";
    }

    return;
  }
}
