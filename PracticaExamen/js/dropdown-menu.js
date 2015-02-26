(function(){
    
 Dropdown = function(pNavigation){
    this.navigation = pNavigation;
    this.items = this.navigation[0].children;
 };
    
 Dropdown.prototype = {
    constructor : Dropdown,
     
    addEventHandler : function(){
        for (var i=0; i<this.items.length; i++){
            this.items[i].ref = this;
            this.items[i].addEventListener("mouseover", this.showHidden, false);
            this.items[i].addEventListener("mouseout", this.hideItem, false);
        }
                
    },
     
    showHidden : function(e){
       var hiddenMenu ="";
       hiddenMenu = this.querySelector(".hiddenMenu");
        if (hiddenMenu !== null){
            hiddenMenu.classList.toggle("hiddenMenu");
            hiddenMenu.classList.toggle("showMenu");
        }
        
    },
     
    hideItem : function(e){
       var items ="";
       items = this.querySelector(".showMenu");
        if (items !== null){
            items.classList.toggle("showMenu");
            items.classList.toggle("hiddenMenu");
        }
    },
  
 }
 
Hamburguer = function(pTrigger, pMenu){
    this.trigger = pTrigger;
    this.menu = pMenu;
    console.log(this.trigger);
};
    
Hamburguer.prototype = {
    constructor: Hamburguer,
    
    addEventHandler: function(){
        this.trigger.ref = this;
        this.menu.ref = this;
        this.trigger.addEventListener("mouseover", this.showHidden, false);
        this.trigger.addEventListener("mouseout", this.hide, false);
    },
    
    showHidden : function(e){
        this.ref.showHiddenMenu();
    },
    
    
    hide: function(e){
         this.ref.hideMenu();
    },
    
    showHiddenMenu : function(){
        this.menu.classList.toggle("hiddenMenu");
    },
    
    
    hideMenu : function(){
        this.menu.classList.toggle("hiddenMenu");

    }
}
     

})();

function init(){
    var nav = document.getElementsByClassName("dropdown");
    var dropdown = new Dropdown(nav);
    dropdown.addEventHandler();

}
window.onload = init;