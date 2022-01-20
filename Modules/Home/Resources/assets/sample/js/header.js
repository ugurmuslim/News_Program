document.addEventListener('DOMContentLoaded', function(){
    const mobile_search_icon2 = document.getElementById('mobile_search_icon2');
    const mobile_search_input2_div = document.getElementById('mobile_search_input2_div');
    const search_icon = document.querySelector('#mobile_search_icon2 path');

    const header__bottom = document.getElementById('nav__text__container');

    mobile_search_icon2.addEventListener('click', function(){
        if(mobile_search_input2_div.classList == 'showSearch2'){
            mobile_search_input2_div.classList.remove('showSearch2');
            header__bottom.style.display = "flex";
            mobile_search_icon2.classList.remove('search2_bg');        
            search_icon.style.stroke = "#242424";    
        }
        else{
            mobile_search_input2_div.classList.add('showSearch2');
            header__bottom.style.display = "none";
            mobile_search_icon2.classList.add('search2_bg');
            search_icon.style.stroke = "#fff";
        }
    });

    mobile_search_input2_div.addEventListener('click',function(e){
        if(e.target.id == 'search_input_times' || e.target.tagName == 'path'){
            mobile_search_input2_div.classList.remove('showSearch2');
            header__bottom.style.display = "flex";
            mobile_search_icon2.classList.remove('search2_bg');        
            search_icon.style.stroke = "#242424";   
        }
    });

    //Menu Tablet and PC
    const main_menu = document.getElementById('large-nav-menu-button');
    const largeNavMenu = document.getElementById("large-nav-menu");

    main_menu.addEventListener('click',function(){
        if(largeNavMenu.style.display == "flex"){
            largeNavMenu.style.display = "none";
            main_menu.style.transform = "scaleY(1)";
            main_menu.style.transition = "200ms ease";
        }
        else{
            largeNavMenu.style.display = "flex";
            main_menu.style.transform = "scaleY(1.3)";
            main_menu.style.transition = "200ms ease";
        }
    });

    //Mobile Menu
    const mobile_menu_open = document.getElementById('drawer-nav-button');
    const mobile_menu = document.getElementById('drawer-nav');
    const mobile_menu_close = document.getElementById('menu_close_icon');

    mobile_menu_open.addEventListener('click',function(){
        mobile_menu.classList.add('drawer_nav_open');
    });
    mobile_menu_close.addEventListener('click',function(){
        mobile_menu.classList.remove('drawer_nav_open');
    });
})
