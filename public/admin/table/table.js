function sortTableByColumn(table, column, asc = true) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });

    // Remove all existing TRs from the table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
});

$("#tinhID").select2({
	placeholder: "Chọn tỉnh/thành",
	allowClear: true
});
$("#quanID").select2({
	placeholder: "Chọn quận/huyện",
	allowClear: true
});
$("#xaID").select2({
	placeholder: "Chọn phường/xã",
	allowClear: true
});

function search_tinhthanh(){  
	var rex = new RegExp($('#tinhID').val());
	if(rex =="/all/"){clearTinh()}else{
		$('.content').hide();
		$('.content').filter(function() {
			return rex.test($(this).text());
		}).show();
	}
}
	
function clearTinh(){
	$('.search_tinhthanh').val('');
	$('.content').show();
}

function search_quanhuyen(){  
	var rex = new RegExp($('#quanID').val());
	if(rex =="/all/"){clearQuan()}else{
		$('.content').hide();
		$('.content').filter(function() {
			return rex.test($(this).text());
		}).show();
	}
}
	
function clearQuan(){
	$('.search_quanhuyen').val('');
	$('.content').show();
}

function search_phuongxa(){  
	var rex = new RegExp($('#xaID').val());
	if(rex =="/all/"){clearPhuong()}else{
		$('.content').hide();
		$('.content').filter(function() {
			return rex.test($(this).text());
		}).show();
	}
}
	
function clearPhuong(){
	$('.search_phuongxa').val('');
	$('.content').show();
}

function search_phone() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_phone");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
}

function search_madaily() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_madaily");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
}

function search_captren() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_captren");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[7];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
}