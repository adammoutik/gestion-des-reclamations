const rows = document.getElementsByClassName("liste");
for (let i=0 ;i<rows.length; ++i) {
    if(rows[i].innerHTML == "Done"){
        rows[i].classList.add('text-success');
}else if(rows[i].innerHTML == "Êchec"){
    rows[i].classList.add('text-danger');
}else{
    rows[i].classList.remove('text-danger');
    rows[i].classList.remove('text-success');
}
}