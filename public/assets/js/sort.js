var index;      // cell index
var toggleBool; // sorting asc, desc
function sorting(tbody, index){
    this.index = index;
    if(toggleBool){
        toggleBool = false;
    }else{
        toggleBool = true;
    }

    var datas= new Array();
    var tbodyLength = tbody.rows.length;
    for(var i=0; i<tbodyLength; i++){
        datas[i] = tbody.rows[i];
    }

    // sort by cell[index]
    datas.sort(compareCells);
    for(var i=0; i<tbody.rows.length; i++){
        // rearrange table rows by sorted rows
        tbody.appendChild(datas[i]);
    }
}

function compareCells(a,b) {
    var aVal = a.cells[index].innerText;
    var bVal = b.cells[index].innerText;

    aVal = aVal.replace(/\,/g, '');
    bVal = bVal.replace(/\,/g, '');

    if(toggleBool){
        var temp = aVal;
        aVal = bVal;
        bVal = temp;
    }

    if(aVal.match(/^[0-9]+$/) && bVal.match(/^[0-9]+$/)){
        return parseFloat(aVal) - parseFloat(bVal);
    }
    else{
        if (aVal < bVal){
            return -1;
        }else if (aVal > bVal){
            return 1;
        }else{
            return 0;
        }
    }
}
