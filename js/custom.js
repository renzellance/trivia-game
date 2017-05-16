function showStuff(element)  {
    var tabContents = document.getElementsByClassName('tabContent');
    for (var i = 0; i < tabContents.length; i++) { 
        tabContents[i].style.display = 'none';
    }
    
    var tabContentIdToShow = element.id.replace(/(\d+)/g, '-$1');
    document.getElementById(tabContentIdToShow).style.display = 'block';
}