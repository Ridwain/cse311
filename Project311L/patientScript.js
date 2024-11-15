function loadContent(page) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `patientFetchContent.php?page=${page}`, true);
    xhr.onload = function () {
      if (this.status === 200) {
        document.getElementById("content").innerHTML = this.responseText;
      } else {
        document.getElementById("content").innerHTML = "<p>Failed to load content.</p>";
      }
    };
    xhr.send();
  }