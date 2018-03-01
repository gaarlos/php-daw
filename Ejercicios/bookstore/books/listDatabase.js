function listBooks (table) {
  xmlhttp = new XMLHttpRequest()

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table").innerHTML = this.responseText;
    }
  }

  xmlhttp.open("GET", "listDatabase.php?q=" + table, true)
  xmlhttp.send()
}
