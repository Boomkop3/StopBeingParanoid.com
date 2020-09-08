var methods = getMethods(dataset);
var length = methods.length;
var table = document.getElementById('jsTable');
for (let i = 0; i < length; i++) {
  try {
    // Define this seperately so it can be displayed in the console
    let method = methods[i];
    try {
      let info = dataset[method]();
      let name = info[0].trim();
      if (name == "") name = method;
      let output = "" + (info[1]());
      // Block anything invalid from appearing on screen
      {
        let allowed = true;
        let filter = [
          "", 
          "[object Storage]", 
          "undefined"
        ]
        for (let i = 0; i < filter.length; i++){
          if (output == filter[i]) {
            allowed = false;
            break;
          }
        }
        if (!allowed){
          console.log("No valid info from: " + method);
          continue;
        }
      }
      // continue
      let datarow = table.insertRow();
      let th = document.createElement('TH');
      let td = document.createElement('TD');
      datarow.appendChild(th);
      datarow.appendChild(td);
      th.classList.add("right-align");
      th.appendChild(
        document.createTextNode(
          name + ": "
        )
      );
      let ul = document.createElement('UL');
      ul.classList.add("collection");
      let li = document.createElement('LI');
      li.classList.add("collection-item");
      let text = ("" + output).trim();
      if (text == "") text = "None";
      li.appendChild(
        document.createTextNode(
          text
        )
      );
      ul.appendChild(li);
      td.appendChild(ul); 
    } catch (err) {
      console.log("An error occured while handling: " + method);
    }
  }
  catch(err) {
    Console.log(err);
  }
}