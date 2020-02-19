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

    createTransition(40, 6, 0.5, 14).then(() => {
      createTransition(40, 14, 0.5, 6);
    });

    /*setTimeout(() => {
      downArrowIcon.style.bottom = "-6.5px";
    }, 500);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-7px";
    }, 550);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-7.5px";
    }, 600);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-8px";
    }, 650);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-8.5px";
    }, 700);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-9px";
    }, 750);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-9.5px";
    }, 800);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-10px";
    }, 850);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-9.5px";
    }, 900);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-9px";
    }, 950);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-8.5px";
    }, 1000);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-8px";
    }, 1050);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-7.5px";
    }, 1100);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-7px";
    }, 1150);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-6.5px";
    }, 1200);
    setTimeout(() => {
      downArrowIcon.style.bottom = "-6px";
    }, 1250);*/
    return;
  }
}
