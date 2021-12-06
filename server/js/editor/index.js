function main() {
  const view = document.getElementById("view");
  const add = document.getElementById("add");
  const assets = document.getElementById("assets");

  view.onclick = (e) => {
    console.log(view.prop);
    console.log("view");
  };

  add.onclick = () => {
    const addSetup = document.getElementById("add-setup");
    addSetup.style.display =
      addSetup.style.display === "none" ? "block" : "none";
    if (addSetup.style.display === "none") {
      addSetup.style.display = "none";
      add.children[0].style.fill = "#FFFFFF";
    } else {
      addSetup.style.display = "block";
      add.children[0].style.fill = "#257afd";
    }
  };

  assets.onclick = () => {
    console.log("assets");
  };
}

main();
