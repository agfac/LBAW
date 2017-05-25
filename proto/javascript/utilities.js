function sortTable(index, tipe, sortFlag) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.getElementsByTagName("TR");
      /*Loop through all table rows (except the first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare, one from current row and one from the next:*/
       
           if( tipe === "INTEGER") {
              x = parseFloat( (rows[i].getElementsByTagName("TD")[index]).innerHTML );
              y = parseFloat( (rows[i + 1].getElementsByTagName("TD")[index]).innerHTML );
           // }else if( tipe === "DATE" ){
           //    x = rows[i].getElementsByTagName("TD")[index].innerHTML.toLowerCase();
           //    y = rows[i + 1].getElementsByTagName("TD")[index].innerHTML.toLowerCase();
           }else{ 
              x = rows[i].getElementsByTagName("TD")[index].innerHTML.toLowerCase();
              y = rows[i + 1].getElementsByTagName("TD")[index].innerHTML.toLowerCase();
           }
          
          if (x > y && !sortFlag ) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
          else if (x < y && sortFlag) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
      }

      if (shouldSwitch) {
        /*If a switch has been marked, make the switch and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }

    } 

  }
