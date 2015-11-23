function loadStates(){
    
    var formName = 'get_state';
    var country = document[formName]['country'].value;
    
    var xmlhttp = null;
    if(typeof XMLHttpRequest != 'udefined'){
        xmlhttp = new XMLHttpRequest();
    }else if(typeof ActiveXObject != 'undefined'){
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }else 
        throw new Error('You browser doesn\'t support ajax');
        
    xmlhttp.open('GET', 'load_states.php?country='+country, true);
    xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState == 4)
            window.insertStates(xmlhttp);
    };
    xmlhttp.send(null);
}

function insertStates(xhr){
    if(xhr.status == 200){
        document.getElementById('states_container').innerHTML = xhr.responseText;
    }else 
        throw new Error('Server has encountered an error\n'+
                         'Error code = '+xhr.status);
}
