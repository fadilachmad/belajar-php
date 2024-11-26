const keyword = document.getElementById("keyword");
const container = document.getElementById("container");

keyword.addEventListener("keypress", () => {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  xhr.open("GET", `ajax/table.php?keyword=${keyword.value}`, "true");
  xhr.send();
});
