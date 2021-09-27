/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function fromArrayToQueryString( dat){
    var querySt="&";
    if(dat!==null){
        querySt='';
        Object.keys(dat).map((item,idx)=>{
            querySt+=item+'='+dat[item]+'&';
        });
    }
    return querySt.slice(0, -1);
}
var TableService = new Object({
    getElements: function(cb,queryData){
       
       $.ajax({
                type: "GET",
                url: searchUrl,
                data: fromArrayToQueryString(queryData),
                success: function (response) {
                    var data = response;
                    cb(data);     
                },
                error: function(xhr, ajaxOptions, thrownError){
                    cb(null);
                }
            });
    
},
editElement: function(cb,queryData){
     $.ajax({
                type: "POST",
                url: editUrl,
                data: queryData,
                success: function (response) {
                    var data = response;
                    cb(data);     
                },
                error: function(xhr, ajaxOptions, thrownError){
                    cb(null);
                }
            });
}
});
