function listDatabase (table) {
  xmlhttp = new XMLHttpRequest()

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('table').innerHTML = this.responseText;
    }
  }

  xmlhttp.open('GET', `../ajax/listDatabase.php?q=${table}`, true)
  xmlhttp.send()
}

function addBook (e) {
  let form = document.getElementById('form').checkValidity()

  if (form) {
    e.preventDefault()
    let values = getValues()
    addTo('book', values)
  } else {
    return
  }
}

function addCustomer (e) {
  let form = document.getElementById('form').checkValidity()
  
  if (form) {
    e.preventDefault()
    let values = getValues()
    addTo('customer', values)
  } else {
    return
  }
}

function addTo (table, values) {
  xmlhttp = new XMLHttpRequest()
  values = values.join('=')
  
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var status = document.getElementById('status')
      status.innerHTML = this.responseText;
      document.getElementById('status')
      listDatabase(table)
    }
  }

  xmlhttp.open('GET', `../ajax/add${capitalize(table)}.php?q=` + values, true)
  xmlhttp.send()
}

function getValues () {
  var values = []
  var inputs = document.getElementsByTagName('input')
  
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].type === 'radio' && !inputs[i].checked) { continue }
    values.push(inputs[i].value)
  }

  document.getElementById('form').reset()
  return values
}

const capitalize = str => str.charAt(0).toUpperCase() + str.slice(1)