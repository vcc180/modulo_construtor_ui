

</div><!--view-->
</div>



<div id="clear"></div><!--clear-->
<div id="footer"></div><!--footer-->
</section>
<script>
    function init() {
        let x = getCookie('sidebar');//RECEBE O VALOR  DO SIDEBAR (COOKIE)
        //VERIFICA SE NÃO EXISTE A PROPRIEDADE SIDEBAR
        if (x != '') {
            //SE A PROPRIEDADE É TRUE
            if (x == "true") {
                let sidebar = document.querySelector(".sidebar");//SELECIONO O SIDEBAR
                sidebar.classList.toggle("close");//ATRIBUO SIDEBAR COMO FECHADO
                setCookie('sidebar', true, 30);//ARMAZENA A PROPRIEDADE NO COOKIE
            }
            //SE NÃO EXISTIR A PROPRIEDADE SIDEBAR
        } else {
            setCookie('sidebar', false, 30);//ATRIBUI VALOR PADRÃO COMO TRUE
        }
    }
    function sidebarPropeties() {
        let x = getCookie('sidebar');//RECEBE A PROPRIEDADE DO SIDEBAR
        //VERIFICA SE ESTÁ FECHADO OU ABERTO
        if (x == "true") {
            setCookie('sidebar', false, 30);// ATRIBUI COMO ABERTO
        } else {
            setCookie('sidebar', true, 30);// ATRIBUI COMO FECHADO
        }
    }
    init();
    

    let arrow = document.querySelectorAll(".arrow");

    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");
        });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        sidebarPropeties();
    });

    //COOKIES
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>
</div><!--main-->
<script type="text/javascript" src="<?php echo setURL('view/js/mask.js') ?>"></script>
</body>
</html>
