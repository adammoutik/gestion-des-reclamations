function exportData(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

today ='|' + mm + '/' + dd + '/' + yyyy;
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelector("table"),"rapport"+today);
}